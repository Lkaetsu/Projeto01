@extends('layout')

@section('banner')
<nav class="nav justify-content-start navbar-light bg-light">
    <a class="nav-link active" href="/" aria-current="page"><h1>$School_Logo$</h1><span class="visually-hidden">(current)</span></a>
</nav>
@endsection
@section('content')
    <article>
        <div class="art-title">
            <h2>{{ $curso->name }}</h2>
        </div>
            <div class="art-form">
                <p>{!! $curso->desc !!}</p>
                <br>
                <div>
                    Número Minimo de alunos: {!! $curso->num_min !!}
                    <br>
                    Número Máximo de alunos: {!! $curso->num_max !!}
                    <br>
                    @if ( $curso->closed===true )
                        Matrículas Encerradas
                    @else
                        @if ( $curso->min_not_ach===true )
                            Status atual: Matrículas Abertas - Curso acontecerá!
                        @else
                            Matrículas Abertas - Mínimo de alunos não atingido!
                        @endif
                        <a class="btn btn-primary" href="/">Matricule-se</a>
                    @endif
                </div>
            </div>
        <a href="/">Voltar</a>
    </article>
@overwrite