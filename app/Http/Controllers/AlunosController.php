<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\User;
use App\Models\CursoUser;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function show(Curso $curso){
        $users = User::all();
        $alunos=NULL;
        foreach($users as $user){
            if(User::hasCurso($curso,$user))
                $alunos = [$user,];
        }

        return view('cursos.alunos.show',[
            'curso' => $curso,
            'alunos' => $alunos,
        ]);
    }

    public function assign(Curso $curso){
        $users=User::all();
        foreach($users as $user){
            if(User::hasCurso($curso,$user)){
                $alunos=[$user,];
        }}
        $nota=request()->validate([
            'nota'=>'required|numeric|between:0,10'
        ]);
        foreach($alunos as $aluno){
            CursoUser::where('curso_id','=',$curso->id)
                    ->where('user_id','=',$aluno->id)
                    ->update(['nota'=>$nota]);
        }

        return back()->with('sucesso','Notas atribuidas.');
    }
}
