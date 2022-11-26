<div class="modal" id="Confirmação" tabindex="-1" aria-labelledby="Confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tem certeza?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                <form action="{{ route('UserCont',['curso'=>$curso]) }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">Sim</button>
                <input name="confirm" type="hidden" value="{{$curso->id}}" />
                </form>
            </div>
        </div>
    </div>
</div>
@yield('modal-confirm')