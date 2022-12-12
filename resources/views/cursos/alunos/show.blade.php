@extends('components.layout')

@section('content')
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Atribua as notas dos alunos: </h1>
        @if($alunos!=NULL)
            <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#Altallalu">
                Atribuir todas as notas
            </button>
            <div class="table-responsive-md">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Alunos</th>
                            <th scope="col">Notas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            @foreach ($alunos as $aluno)
                            <td scope="row">{{$aluno->name}}</td>
                            @foreach ($aluno->cursos->where('id','=',$curso->id) as $curso)
                                <td>{{$curso->pivot->nota}}</td>
                            @endforeach
                            <td><button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#Alt1alu">Atribuir nota</button></td>
                            <div class="modal fade" id="Alt1alu" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="Alt1alu" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="Alt1alu">Altere a nota deste aluno</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('assign',['curso'=>$curso])}}" method="post">
                                                @csrf
                                                <div>
                                                    <label for="nota">{{$aluno->name}}</label>
                                                    <input type="number"
                                                        class="border border-gray-400 p-2 w-full"
                                                        name="nota"
                                                        id="nota"
                                                        min="0"
                                                        max="10"
                                                        value="{{old('nota')}}"
                                                        required>
                                                        <small id="nota" class="form-text text-muted">
                                                            @error('nota')
                                                                <p class="error">**{{ $message }}**</p>
                                                            @enderror
                                                        </small>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal fade" id="Altallalu" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="Altallalu" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="form">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="Altallalu">Atribua a nota de todos os alunos</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('assign',['curso'=>$curso])}}" method="post">
                                @csrf
                                @foreach ($alunos as $aluno)
                                @foreach ($aluno->cursos->where('id','=',$curso->id) as $curso)
                                <div>
                                    <label for="nota">{{$aluno->name}}</label>
                                    <input type="number"
                                        class="border border-gray-400 p-2 w-full"
                                        name="nota"
                                        id="nota"
                                        min="0"
                                        max="10"
                                        value="{{ $curso->pivot->nota }}"
                                        required>
                                @endforeach
                                @endforeach
                                        <small id="nota" class="form-text text-muted">
                                            @error('nota')
                                                <p class="error">**{{ $message }}**</p>
                                            @enderror
                                        </small>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        <div>
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
        @endif
        <br>
        </div>
        @else
        <h5>Sem alunos nesse curso até o momento.</h5>
        @endif
        <a href="/">Voltar</a>
    </main>
@endsection