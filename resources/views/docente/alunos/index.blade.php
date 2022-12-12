@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Gerenciamento dos Alunos</h1>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Filme</th>
                        <th scope="col">Cursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        @if(!$user->is_adm||!$user->is_sec||!$user->is_prof)
                            <tr class="">
                                <td scope="row">{{ $user->name }}</td>
                                <td scope="row">{{ $user->cpf }}</td>
                                <td scope="row">{{ $user->endereço }}</td>
                                <td scope="row">{{ $user->filme }}</td>
                                <td>
                                    @foreach ($curso_users as $curso_user)
                                        @if ($user->id==$curso_user->user_id)
                                            {{ $user->cursos->pluck('name')->implode('') }}
                                        @endif
                                    @endforeach
                                </td>
                                <td><a class="btn btn-secondary" href="/docente/alunos/{{ $user->id }}/assign">Atribuir a um curso</a></td>
                                <td><a class="btn btn-secondary" href="/docente/alunos/{{ $user->id }}/edit">Editar</a></td>
                                <form action="/docente/alunos/{{ $user->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <td><button class="btn btn-danger">Deletar</button></td>
                                </form>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection