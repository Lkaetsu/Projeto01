<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class DocenteCursoController extends Controller
{
    public function index(){
        return view('docente.cursos.index',[
            'cursos' => Curso::paginate(20)
        ]);
    }

    public function create(){
        return view('docente.cursos.create');
    }

    public function store(){
        $attributes = request()->validate([
            'name' => 'required',
            'desc_simpl' => 'required',
            'desc' => 'required',
            'num_max' => 'required|numeric',
            'num_min' => 'required|numeric',
            'professor_id' => 'nullable|exists:users,id'
        ]);

        Curso::create($attributes);

        return redirect('/')->with('sucesso','Curso registrado.');
    }

    public function edit(Curso $curso){
        return view('docente.cursos.edit',['curso'=>$curso]);
    }

    public function update(Curso $curso){
        $attributes = request()->validate([
            'name' => 'required',
            'desc_simpl' => 'required',
            'desc' => 'required',
            'num_max' => 'required|numeric',
            'num_min' => 'required|numeric',
            'professor_id' => 'nullable|exists:users,id'
        ]);

        $curso->update($attributes);

        return back()->with('sucesso','Os dados do curso alterados com sucesso.');
    }

    public function destroy(Curso $curso){
        $curso->delete();

        return back()->with('sucesso','Registro do curso deletado.');
    }
}
