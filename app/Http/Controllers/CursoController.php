<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoUser;
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
        $nota=CursoUser::where('user_id','=',$user->id)->where('curso_id','=',$curso->id)->pluck('nota');
        return view('cursos.show',[
            'curso' => $curso,
            'user' => $user,
            'hasCurso' => $hasCurso,
            'nota' => $nota,
            ]);
    }
    return view('cursos.show',[
        'curso' => $curso
        ]);
    }

    public function close(Request $request,$curso_id){
        $closed = $request->input('close');

        Curso::where('id','=',$curso_id)->update(['closed'=>$closed]);

        return back();
    }
}
