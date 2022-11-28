<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Models\Curso;
use App\Models\User;
use Illuminate\Http\Request;

class DocenteProfessorController extends Controller
{
    public function index(){
        return view('docente.professors.index',[
            'professors' => Professor::paginate(20),
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

        $user = User::create($attributes);
        
        Professor::create([
            'name' => $user->name,
            'user_id' => $user->id
        ]);

        return redirect('/')->with('sucesso','Professor registrado.');
    }

    public function edit(Professor $professor){
        return view('docente.professors.edit',['professor'=>$professor]);
    }

    public function update(Professor $professor){
        $id=$professor->user->id;
        $attributes = request()->validate([
            'name'=>'required|max:50',
            'username'=>'required|max:20|unique:users,username,'.$id,
            'cpf'=>'required|numeric|unique:users,cpf,'.$id,
            'endereço'=>'required|max:60',
            'password'=>'required|min:6|max:20',
        ]);

        $professor->user->update($attributes);
        $professor->name=$professor->user->name;

        return back()->with('sucesso','Os dados do professor foram alterados com sucesso.');
    }

    public function destroy(Professor $professor){
        $professor->user->delete();
        $professor->delete();

        return back()->with('sucesso','Registro do professor deletado.');
    }
}
