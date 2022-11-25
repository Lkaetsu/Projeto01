<?php

namespace App\Http\Controllers;

use App\Models\User_Curso;
use Illuminate\Http\Request;

class User_CursoController extends Controller
{
    public function add(Request $request){
        $curso_id = $request->input('confirm');
        $user_id = Auth()->user()->id;
        User_Curso::create([
            'user_id'=>$user_id,
            'curso_id'=>$curso_id,
        ]);
        return back()->with('success', 'Matriculado com sucesso.');
    }
}
