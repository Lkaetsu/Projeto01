<?php

namespace App\Http\Controllers;

use App\Models\CursoUser;
use App\Models\User;
use App\Models\Curso;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function add(Request $request){
        $curso_id = $request->input('confirm');
        $curso = Curso::find($curso_id);
        $user = auth()->user();
        if(User::hasCurso($curso,$user)){
            CursoUser::where('user_id',$user->id)
                ->where('curso_id',$curso_id)
                ->delete();
            return back()->with('sucesso', 'Desmatriculado com sucesso.');
        }
        CursoUser::create([
            'user_id'=>$user->id,
            'curso_id'=>$curso_id,
        ]);
        return back()->with('sucesso', 'Matriculado com sucesso.');
    }

}
