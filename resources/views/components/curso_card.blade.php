@if ($cursos->count()>0)
<body>
  <div class="row row-cols-1 row-cols-md-2 g-4" style="max-width: 72rem">
    @foreach ($cursos as $curso)
      <div class="col-sm-6">
        <div class="card">
          <h3 class="card-header">
            <a href="curso/{{ $curso->id }}">{{ $curso->name }}</a>
          </h3>
          <div class="card-body">
            <p class="card-text">{{ $curso->desc_simpl }}</p>
          @if ( $curso->professor_id==0 )
            Sem atribuição de professor até o momento!
          @else
            Curso Ministrado por: <a href="/?professor={{ $curso->professor->name }}#">{{ $curso->professor->name }}</a>
          @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>
  <br>
  <div class="pagination">{{ $cursos->links() }}
@else
  <p class="text center">Sem cursos aplicáveis registrados por enquanto. Volte mais tarde.</p>
@endif
  @yield('curso-card')
  </div>
</body>