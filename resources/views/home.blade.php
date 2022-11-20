@extends('layout')

@section('banner')
    <nav class="nav justify-content-start navbar-light bg-light">
        <a class="nav-link active" href="/" aria-current="page"><h1>$School_Logo$</h1><span class="visually-hidden">(current)</span></a>
    </nav>
@endsection
@section('content')
    <div class="art-title">
            <h2 class="card-title">Cursos oferecidos:</h2>
    </div>
    <br>
    <div class="art-form">
        @foreach ($cursos as $curso)
        <div class="row-2">
          <div class="col-4">
            <div class="card">
              <div class="card-body">
                <h3 class="card-title">
                    <a href="/home/{{ $curso ->id }}">{{ $curso->name }}</a>
                </h3>
                <p class="card-text">{{ $curso->desc_simpl }}</p>
              </div>
            </div>
          </div>
        @endforeach
    </div>
@endsection