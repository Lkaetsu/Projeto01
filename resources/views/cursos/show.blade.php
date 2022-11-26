@extends('components.modal_confirm')
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
                        Curso Ministrado por: <a href="/?professor={{ $curso->professor->name }}#">{{ $curso->professor->name }}</a>
                    @endif
                    <br>
                    Número Mínimo de alunos: {{ $curso->num_min }}
                    <br>
                    Número Máximo de alunos: {{ $curso->num_max }}
                    <br>
                    @if ( $curso->closed==true )
                        Matrículas Encerradas
                    @else
                        @if ( $curso->min_not_ach==true )
                            Status atual: Matrículas Abertas - Curso acontecerá!
                        @else
                            Matrículas Abertas - Mínimo de alunos não atingido!
                        @endif
                        @auth
                            @if ( $hasCurso==true )
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Confirmação">Desmatricule-se</button>
                            @elseif ($curso->closed==false)
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Confirmação">Matricule-se</button>
                            @endif
                            @section('modal-confirm')
                            @endsection
                            @if ( $hasCurso==true )
                            <br>
                            Nota: {{ $curso_user->nota }}
                            @endif
                        @else
                            <a class="btn btn-primary" href="/register">Matricule-se</a>
                        @endauth
                    @endif
                </div>
            </div>
        <br>
        <a href="/">Voltar</a>
    </article>
@endsection