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
<article>
    <h2>{{ $curso->nome }}</h2>
    <div>
        {!! $curso->desc !!}
    </div>
    <a href="/">Voltar</a>
</article>
@endsection