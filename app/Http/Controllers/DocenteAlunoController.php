<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Curso;
use App\Models\CursoUser;
use Illuminate\Http\Request;

class DocenteAlunoController extends Controller
{
    public function index(){
        return view('docente.alunos.index',[
            'users' => User::paginate(30)->where('is_prof',false)->where('is_sec',false)->where('is_adm',false),
            'cursos' => Curso::all(),
            'curso_users' => CursoUser::all()
        ]);
    }

    public function register(){
        return view('docente.alunos.register');
    }

    public function store(){
        $attributes = request()->validate([
            'name'=>'required|max:50',
            'username'=>'required|max:20|unique:users,username',
            'cpf'=>'required|numeric|unique:users,cpf',
            'endereço'=>'required|max:60',
            'filme' =>'nullable|max:40',
            'password'=>'required|min:6|max:20',
        ]);

        $user = User::create($attributes);

        return redirect('/')->with('sucesso','Aluno registrado.');
    }

    public function edit(User $user){
        return view('docente.alunos.edit',['user'=>$user]);
    }

    public function update(User $user){
        
        $id=$user->id;
        $attributes = request()->validate([
            'name'=>'required|max:50',
            'username'=>'required|max:20|unique:users,username,'.$id,
            'cpf'=>'required|numeric|unique:users,cpf,'.$id,
            'endereço'=>'required|max:60',
            'filme' =>'nullable|max:40',
            'password'=>'required|min:6|max:20',
        ]);

        $user->update($attributes);

        return back()->with('sucesso','Os dados do aluno foram alterados com sucesso.');
    }

    public function destroy(User $user){
        $user->delete();

        return back()->with('sucesso','Registro do aluno deletado.');
    }

    public function assign(User $user){
        return view('docente.alunos.assign',[
            'user'=>$user,
            'cursos'=>Curso::all(),
        ]);
    }

    public function storeassign(User $user){
        $cursos_id = request()->validate([
            'curso_id'=>'required|numeric',
        ]);
        foreach($cursos_id as $curso_id)
            $cursouser = CursoUser::create([
                'user_id'=>$user->id,
                'curso_id'=>$curso_id,
            ]);

        return back()->with('sucesso','Curso atribuído ao aluno.');
    }
}
