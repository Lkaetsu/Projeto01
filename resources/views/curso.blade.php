@extends('components.layout')

@section('content')
    <article>
        <div class="art-title">
            <h2>{{ $curso->name }}</h2>
        </div>
            <div class="art-form">
                <p>{!! $curso->desc !!}</p>
                <br>
                <div>
                    @if ( $curso->professor_id==0 )
                        Sem atribuição de professor até o momento!
                    @else
                        Curso Ministrado por: <a href="professors/{{ $curso->professor->name }}">{{ $curso->professor->name }}</a>
                    @endif
                    <br>
                    Número Mínimo de alunos: {{ $curso->num_min }}
                    <br>
                    Número Máximo de alunos: {{ $curso->num_max }}
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