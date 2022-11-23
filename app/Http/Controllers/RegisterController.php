<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(Request $request){
        $attributes=request()->validate([
            'name'=>'required|max:50',
            'username'=>'required|max:50|unique:users',
            'cpf'=>'required|numeric|max:11',
            'endereço'=>'required|max:60',
            'filme'=>'nullable|max:40',
            'password'=>'required',
        ]);
        User::create($attributes);
        return redirect('/');
        
    }
}
