@extends('components.layout')

@section('content')
    <main class="max-w-lg mx-auto">
        <h1 class="text-center">Atribua as notas dos alunos: </h1>
        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#Altallalu">
            Edit
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
                        <td></td>
                        <td><button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#Alt1alu">Edit</button></td>
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
                        <h5 class="modal-title" id="Altallalu">Altere a nota de todos os alunos</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('assign',['curso'=>$curso])}}" method="post">
                            @csrf
                            @foreach ($alunos as $aluno)
                            <div>
                                <label for="nota">{{$aluno->name}}</label>
                                <input type="number"
                                    class="border border-gray-400 p-2 w-full"
                                    name="nota"
                                    id="nota"
                                    min="0"
                                    max="10"
                                    value="{{ old('nota') }}"
                                    required>
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
        <a href="/">Voltar</a>
    </main>
@endsection