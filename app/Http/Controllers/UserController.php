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
        else{
            $cursouser = CursoUser::create([
                'user_id'=>$user->id,
                'curso_id'=>$curso_id,
            ]);
            if(CursoUser::where('curso_id','=',$curso_id)->count()>=$curso->num_min){
                Curso::where('id','=',$curso_id)->where('min_not_ach','=',false)->update(['min_not_ach'=>true]);
            }
            if(CursoUser::where('curso_id','=',$curso_id)->count()<=$curso->num_min){
                Curso::where('id','=',$curso_id)->where('min_not_ach','=',true)->update(['min_not_ach'=>false]);
            }
            if(CursoUser::where('curso_id','=',$curso_id)->count()==$curso->num_max){
                Curso::where('id','=',$curso_id)->where('closed','=',false)->update(['closed'=>true]);
            }

        }
        return back()->with('sucesso', 'Matriculado com sucesso.');
    }

}
