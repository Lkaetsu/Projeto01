@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Gerenciamento dos Professores</h1>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Cursos</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($professors as $professor)
                        <tr class="">
                            <td scope="row">{{ $professor->name }}</td>
                            <td>
                            @foreach ($cursos as $curso)
                                @if ($professor->id==$curso->professor_id)
                                    {{ $curso->name }}
                                @endif
                            @endforeach
                            </td>
                            <td><a class="btn btn-secondary" href="/docente/professors/{{ $professor->id }}/assign">Atribuir a um curso</a></td>
                            <td><a class="btn btn-secondary" href="/docente/professors/{{ $professor->id }}/edit">Editar</a></td>
                            <form action="/docente/professors/{{ $professor->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <td><button class="btn btn-danger">Deletar</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">{{ $professors->links() }}</div>
    </main>
@endsection