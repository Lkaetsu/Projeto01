@extends('components.layout')

@section('content')
    <div class="art-title">
            <h2 class="card-title">Cursos oferecidos:</h2>
    </div>
    <br>
    <div class="art-form">
      @if ($cursos->count()>1)
        <div class="row row-cols-1 row-cols-md-2 g-4" style="max-width: 72rem">
          @foreach ($cursos as $curso)
              <div class="col-sm-6">
                <div class="card">
                  <h3 class="card-header">
                    <a href="/{{ $curso->id }}">{{ $curso->name }}</a>
                  </h3>
                  <div class="card-body">
                    <p class="card-text">{{ $curso->desc_simpl }}</p>
                  @if ( $curso->professor_id==0 )
                    Sem atribuição de professor até o momento!
                  @else
                    Curso Ministrado por: <a href="professors/{{ $curso->professor->name }}">{{ $curso->professor->name }}</a>
                  @endif
                  </div>
                </div>
              </div>
          @endforeach
        </div>
      @endif
    </div>
@endsection