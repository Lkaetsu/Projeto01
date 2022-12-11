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
                    @if ($user->is_sec==true||$user->is_prof==true)
                        @php
                            $aprovados=App\Models\CursoUser::where('curso_id','=',$curso->id)->where('nota','>',5)->count();
                            $media=App\Models\CursoUser::where('curso_id','=',$curso->id)->sum('nota');
                            $count=App\Models\CursoUser::where('curso_id','=',$curso->id)->count();
                        @endphp
                        @if($count!=0)
                            Média Geral do Curso: {{  $media/$count  }}
                            <br>
                            Alunos aprovados até o momento: {{ $aprovados }} - {{ $aprovados / $count * 100 }}%
                            <br>
                            Alunos reprovados até o momento: {{ $count-$aprovados }} - {{ ($count-$aprovados) / $count * 100 }}%
                        @else
                            Sem alunos até o momento
                        @endif
                        <br>
                    @endif
                    @if ( $curso->closed==true )
                        Matrículas Encerradas
                    @else
                        @if ( $curso->min_not_ach==true )
                            Status atual: Matrículas Abertas - Curso acontecerá!
                        @else
                            Matrículas Abertas - Mínimo de alunos não atingido!
                        @endif
                        @auth
                            @if ($user->is_sec==true)
                                <br>
                                @if ($curso->closed==false)
                                    <form action="{{ route('close',['curso'=>$curso]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="close" value="1">
                                    <button type="submit">Fechar a Matrícula</button>
                                    </form>
                                @else
                                    <form action="{{ route('close',['curso'=>$curso]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="close" value="0">
                                    <button type="submit">Reabrir a Matrícula</button>
                                    </form>
                                @endif
                            @endif
                            @if($user->is_prof==true && $user->id==$curso->professor_id || $user->is_sec==true)
                                <br>
                                <a class="btn btn-primary" href="/{{$curso->id}}/alunos">Alunos</a>
                            @elseif($user->is_sec==false)
                                @if ( $hasCurso==true )
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Confirmação">Desmatricule-se</button>
                                    @section('modal-confirm')
                                    @endsection
                                @elseif ($curso->closed==false)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Confirmação">Matricule-se</button>
                                    @section('modal-confirm')
                                    @endsection
                                @endif
                                @if ( $hasCurso==true )
                                    <br>
                                    Nota: {{ $nota }}
                                @endif
                            @endif
                        @elseif ($curso->closed==false)
                            <a class="btn btn-primary" href="/register">Matricule-se</a>
                        @endauth
                    @endif
                </div>
            </div>
        <br>
        <a href="/">Voltar</a>
    </article>
@endsection