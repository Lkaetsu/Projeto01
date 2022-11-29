<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class DocenteProfessorController extends Controller
{
    public function index(){
        return view('docente.professors.index',[
            'professors' => User::where('is_prof',true)->paginate(20),
            'cursos' => Curso::all()
        ]);
    }

    public function register(){
        return view('docente.professors.register');
    }

    public function store(){
        $attributes = request()->validate([
            'name'=>'required|max:50',
            'username'=>'required|max:20|unique:users,username',
            'cpf'=>'required|numeric|unique:users,cpf',
            'endereço'=>'required|max:60',
            'password'=>'required|min:6|max:20',
        ]);

        $user = User::create([$attributes,'is_prof'=>true]);

        return redirect('/')->with('sucesso','Professor registrado.');
    }

    public function edit(User $user){
        return view('docente.professors.edit',['user'=>$user]);
    }

    public function update(User $user){
        $id=$user->id;
        $attributes = request()->validate([
            'name'=>'required|max:50',
            'username'=>'required|max:20|unique:users,username,'.$id,
            'cpf'=>'required|numeric|unique:users,cpf,'.$id,
            'endereço'=>'required|max:60',
            'password'=>'required|min:6|max:20',
        ]);

        $user->update([$attributes,'is_prof'=>true]);

        return back()->with('sucesso','Os dados do professor foram alterados com sucesso.');
    }

    public function destroy(User $user){
        $user->delete();

        return back()->with('sucesso','Registro do professor deletado.');
    }

    public function assign(User $user){
        return view('docente.professors.assign',[
            'user'=>$user,
            'cursos'=>Curso::all()
        ]);
    }

    public function storeassign(User $user){
        $cursos_id = request()->validate([
            'curso_id'=>'required|numeric',
        ]);
        foreach($cursos_id as $curso_id)
            Curso::where('id','=',$curso_id)->update([
                'professor_id'=>$user->id
            ]);

        return back()->with('sucesso','Curso atribuído ao professor.');
    }
}
