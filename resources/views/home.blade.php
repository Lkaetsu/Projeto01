@extends('layout')

@section('banner')
    <div class="card text-white" style="background-color:rgb(0, 0, 255);">
        <div class="card-body">
            <h1 class="card-title">$Nome_Escola$</h1>
            <p class="card-text">Disponibilizamos cursos online</p>
        </div>
    </div>
@endsection
@section('content')
    <h2><span class="badge bg-primary">Cursos</span></h2>
    <div class="row row-cols-1 row-cols-2">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><a href="\curso">{{ $Curso->nome }}</a></h3>
                    <p class="card-text">{!! $Curso->desc_simp !!}</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Curso2</h3>
                    <p class="card-text">Nesse curso o aluno aprederá a...</p>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Curso3</h3>
                    <p class="card-text">Nesse curso o aluno aprederá a...</p>
                </div>
            </div>
        </div>
    </div>
@endsection