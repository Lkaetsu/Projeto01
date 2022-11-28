<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('session.create');
    }

    public function store(){
        $attributes = request()->validate([
            'username'=>'required',
            'password'=>'required',
        ]);
        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('sucesso','Usuário logado.');
        }
        
        throw ValidationException::withMessages([
            'username'=>'Usuário não existe.',
            'password'=>'Senha Incorreta.',
        ]);
    }

    public function destroy(){
        auth()->logout();
        return redirect('/')->with('sucesso','Usuário deslogado.');
    }
}
