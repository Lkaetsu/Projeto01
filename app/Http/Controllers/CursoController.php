<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Professor;
use App\Models\User;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index(){
        return view('cursos.index',[
        'cursos' => Curso::latest()->filter(request(['search', 'professor']))
        ->paginate(6)->withQueryString()
        ]);
    }

    public  function show(Curso $curso){
    if(auth()->check()){
        $id = auth()->id();
        return view('cursos.show',[
            'curso' => $curso,
            'id' => $id
            ]);
    }
    return view('cursos.show',[
        'curso' => $curso
        ]);
    }
}
