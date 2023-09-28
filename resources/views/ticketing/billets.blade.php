<div class="row">
    @foreach ($billets as $billet)
        <div class="col-sm-6">
            <label class="form-label">Billets de {{ $billet->amount }}
                {{ $billet->currency->symbol }}</label>
            <input type="number" min="0" required name="{{ $billet->id }}" class="form-control" id="employeeName"
                placeholder="Nombre de billets">
        </div>
    @endforeach

</div>
