@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Atribua esse professor a um curso</h1>
        <br>
        <div class="inner">
            <form method="POST" action="{{ route('assign.professor',['user'=>$user]) }}">
                @csrf
                <br>
                <div class="mb-6">
                    <label for="curso_id">Curso a ser atribuido</label>
                    <select name="curso_id" id="curso_id">
                        <option value="">Não atribuir</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->name }}</option>
                        @endforeach
                    </select>
                    <small id="curso_id" class="form-text text-muted">
                    @error('curso_id')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <button type="submit" class="btn btn-primary">Confirmar</button>
            </form>
        </div>
    </main>
@endsection