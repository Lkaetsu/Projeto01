@extends('components.layout')

@section('content')
    <br>
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Registre um novo professor</h1>
        <br>
        <div class="inner">
            <form method="POST" action="/docente/professors/">
                @csrf
                <div class="mb-6">
                    <label for="name">Nome Completo</label>
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
                    <label for="username">Nome de Usuario</label>
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
                <div class="mb-6">
                    <label for="cpf">CPF</label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="cpf" 
                        id="cpf"
                        value="{{ old('cpf') }}"
                        required>
                    <small id="cpf" class="form-text text-muted">
                    @error('cpf')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="endereço">Endereço de Moradia</label>
                    <input type="text"
                        class="border border-gray-400 p-2 w-full"
                        name="endereço" 
                        id="endereço"
                        value="{{ old('endereço') }}"
                        required>
                    <small id="endereço" class="form-text text-muted">
                    @error('endereço')
                        <p class="error">**{{ $message }}**</p>
                    @enderror
                    </small>
                </div>
                <br>
                <div class="mb-6">
                    <label for="password">Senha</label>
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </main>
@endsection