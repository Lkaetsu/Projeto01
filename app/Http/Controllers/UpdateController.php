<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function create(){
        return view('update.create',[
            'user' => auth()->user()
        ]);
    }

    public function store(){
            $id=auth()->id();
            $attributes=request()->validate([
                'name'=>'required|max:50',
                'username'=>'required|max:20|unique:users,username,'.$id,
                'cpf'=>'required|numeric|unique:users,cpf,'.$id,
                'endereço'=>'required|max:60',
                'filme'=>'required|max:40',
                'password'=>'required|'
            ]);

        $user=User::where('id',$id)->Update($attributes);

        return redirect('/')->with('sucesso','Seus dados foram alterados');
    }
}
