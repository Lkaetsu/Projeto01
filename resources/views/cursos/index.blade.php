@extends('components.curso_card')
@extends('components.layout')

@section('content')
  <div class="art-title">
      <h2 class="card-title">Cursos oferecidos:</h2>
      <br>
      <div class="px-3 py-2">
        <form method="GET" action='#'>
          <input type="text" name="search" placeholder="Buscar"
                  class="bg-transparent placeholder-gray font-semibold text-sm"
                  value="{{ request('search') }}">
            @auth
              @if($user->is_prof)
              <a href="/?professor={{ $professor->name }}#"><h5>Meus Cursos: </h5></a>
              @else
              <a href="/?user={{ $user->id }}#"><h5>Meus Cursos: </h5></a>
              @endif
            @endauth
        </form>
      </div>
  </div>
@endsection
  <div class="art-form">
    @section('curso-card')
    @endsection
  </div>