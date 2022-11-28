@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Registre um novo curso</h1>
        <br>
        <div class="inner">
            <form method="POST" action="docente/cursos/">
                @csrf
                <div class="mb-6">
                    <label for="name">Nome</label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="name" 
                        id="name"
                        value="{{ old('name') }}"
                        required>
                        <small id="name" class="form-text text-muted">
                            @error('name')
                                <p class="error">**{{ $message }}**</p>
                            @enderror
                        </small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="desc_simpl">Descrição Simplificada</label>
                    <textarea type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="desc_simpl" 
                        id="desc_simpl"
                        value="{{ old('desc_simpl') }}"
                        required></textarea>
                        <small id="desc_simpl" class="form-text text-muted">
                        @error('desc_simpl')
                            <p class="error">**{{ $message }}**</p>
                        @enderror
                        </small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="desc">Descrição</label>
                    <textarea type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="desc" 
                        id="desc"
                        value="{{ old('desc') }}"
                        required></textarea>
                    <small id="desc" class="form-text text-muted">
                    @error('desc')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="num_min">Número mínimo de alunos</label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="num_min" 
                        id="num_min"
                        value="{{ old('num_min') }}"
                        required>
                    <small id="num_min" class="form-text text-muted">
                    @error('num_min')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="num_max">Número máximo de alunos</label>
                    <input type="num_max"
                        class="border border-gray-400 p-2 w-full"
                        name="num_max" 
                        id="num_max" 
                        required>
                    <small id="num_max" class="form-text text-muted">
                    @error('num_max')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="professor_id">Professor</label>
                    <select name="professor_id" id="professor_id">
                        <option value="">Sem Professor</option>
                        @foreach (\App\Models\Professor::all() as $professor)
                            <option value="{{ $professor->id }}">{{ $professor->name }}</option>
                        @endforeach
                    </select>
                    <small id="professor_id" class="form-text text-muted">
                    @error('professor_id')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
@endsection