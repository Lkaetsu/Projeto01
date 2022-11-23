@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Registre-se</h1>
        <br>
        <div class="inner">
            <form method="POST" action="/register">
                @csrf
                <div class="mb-6">
                    <label for="name"></label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="name" 
                        id="name" 
                        required>
                        <small id="name" class="form-text text-muted">Nome Completo</small>
                    @error('name')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                </div>
                <br>
                <div class="mb-6">
                    <label for="username"></label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="username" 
                        id="username" 
                        required>
                        <small id="username" class="form-text text-muted">Nome de Usuario</small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="cpf"></label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="cpf" 
                        id="cpf" 
                        required>
                    <small id="cpf" class="form-text text-muted">CPF</small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="endereço"></label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="endereço" 
                        id="endereço" 
                        required>
                    <small id="endereço" class="form-text text-muted">Endereço de Moradia</small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="filme"></label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="filme" 
                        id="filme" 
                        required>
                    <small id="filme" class="form-text text-muted">Filme de Preferência</small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="password"></label>
                    <input type="password"
                        class="border border-gray-400 p-2 w-full"
                        name="password" 
                        id="password" 
                        required>
                    <small id="password" class="form-text text-muted">Senha</small>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
@endsection