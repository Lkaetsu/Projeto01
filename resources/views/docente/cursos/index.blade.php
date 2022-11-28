@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Gerenciamento dos Cursos</h1>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Professor</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cursos as $curso)
                        <tr class="">
                            <td scope="row"><a class="table" href="/curso/{{ $curso->id }}"><h6>{{ $curso->name }}</h6></a></td>
                            @if ($curso->professor)
                                <td>{{ $curso->professor->name }}</td>
                            @else
                                <td>Sem atribuição de professor até o momento!</td>
                            @endif
                            @if ($curso->min_not_ach)
                            <td>Matrículas Abertas - Mínimo de alunos não atingido!</td>
                            @elseif ($curso->closed)
                            <td>Matrículas Encerradas</td>
                            @else
                                <td>Matrículas Abertas - Curso acontecerá!</td>
                            @endif
                            <td><a class="btn btn-secondary" href="/docente/cursos/{{ $curso->id }}/edit">Editar</a></td>
                            <form action="/docente/cursos/{{ $curso->id }}" method="post">
                                @csrf
                                @method('DELETE')
                            <td><button class="btn btn-danger">Deletar</button></td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">{{ $cursos->links() }}</div>
    </main>
@endsection