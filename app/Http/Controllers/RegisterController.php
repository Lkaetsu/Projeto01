<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }


    public function store(){
        $attributes=request()->validate([
            'name'=>'required|max:50',
            'username'=>'required|max:20|unique:users,username',
            'cpf'=>'required|numeric|unique:users,cpf',
            'endereço'=>'required|max:60',
            'filme'=>'required|max:40',
            'password'=>'required|min:6|max:20',
        ]);

        $user=User::Create($attributes);

        auth()->login($user);

        return redirect('/')->with('sucesso','Sua conta foi criada');
        
    }
}
