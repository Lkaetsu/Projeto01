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
                    @if ( $curso->closed===true )
                        Matrículas Encerradas
                    @else
                        @if ( $curso->min_not_ach===true )
                            Status atual: Matrículas Abertas - Curso acontecerá!
                        @else
                            Matrículas Abertas - Mínimo de alunos não atingido!
                        @endif
                        @auth
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Confirmação">Matricule-se</button>
                            <div class="modal" id="Confirmação" tabindex="-1" aria-labelledby="Confirm">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tem certeza que quer matricular nessa matéria?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                            <form action="{{ route('add',['curso'=>$curso]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Sim</button>
                                            <input name="confirm" type="hidden" value="{{$curso->id}}" />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                        <a class="btn btn-primary" href="/register">Matricule-se</a>
                        @endauth
                    @endif
                </div>
            </div>
        <a href="/">Voltar</a>
    </article>
@overwrite