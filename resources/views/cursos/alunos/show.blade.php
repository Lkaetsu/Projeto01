@extends('components.layout')

@section('content')
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Atribua as notas dos alunos: </h1>
        <br>
        <a href="/">Voltar</a>
        <div class="inner">
            <br>
            @foreach ($alunos as $aluno)
                <form method="POST" action="{{route('assign',['curso'=>$curso,'aluno'=>$aluno])}}">
                    @csrf
                    <div>
                        <label for="nota">{{ $aluno->name }}</label>
                        <input type="number"
                            class="border border-gray-400 p-2 w-full"
                            name="nota"
                            id="nota"
                            min="0"
                            max="10"
                            required>
                            <small id="nota" class="form-text text-muted">
                                @error('nota')
                                    <p class="error">**{{ $message }}**</p>
                                @enderror
                            </small>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <br>
            @endforeach
        </div>
    </main>
@endsection