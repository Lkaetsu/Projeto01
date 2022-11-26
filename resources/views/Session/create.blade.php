@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Inicie sua sessão</h1>
        <br>
        <div class="inner">
            <form method="POST" action="/login">
                @csrf
                <div class="flex mb-6">
                    <label for="username">Nome de Usuário: </label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="username" 
                        id="username"
                        value="{{ old('username') }}"
                        required>
                        <small id="username" class="form-text text-muted">
                        @error('username')
                            <p class="error">**{{ $message }}**</p>
                        @enderror
                    </small>
                </div>
                <br>
                <div class="flex mb-6">
                    <label for="password">Senha: </label>
                    <input type="password"
                        class="border border-gray-400 p-2 w-full"
                        name="password" 
                        id="password" 
                        required>
                    <small id="password" class="form-text text-muted">
                    @error('password')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Entre</button>
            </form>
        </div>
    </main>
@endsection