@extends('components.layout')


@section('content')
<div class="art-form">
    @foreach ($cursos as $curso)
    <div class="row-2">
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <h3 class="card-title">
                <a href="/{{ $curso->id }}">{{ $curso->name }}</a>
            </h3>
            <p class="card-text">{{ $curso->desc_simpl }}</p>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection