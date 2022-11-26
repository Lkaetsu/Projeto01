<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoUser;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        return view('cursos.index',[
        'cursos' => Curso::latest()->filter(request(['search', 'professor','user']))
        ->paginate(6)->withQueryString(),
        'user' => auth()->user(),
        ]);
    }

    public  function show(Curso $curso){
    if(auth()->check()){
        $user=auth()->user();
        $hasCurso=User::hasCurso($curso,$user);
        $curso_user=CursoUser::where($user->id='user_id')->where($curso->id='curso_id');
        return view('cursos.show',[
            'curso' => $curso,
            'user' => $user,
            'hasCurso'=>$hasCurso,
            'curso_user'=>$curso_user
            ]);
    }
    return view('cursos.show',[
        'curso' => $curso
        ]);
    }
}
