@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Enregistrement des Operations</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="live-preview">
                    <form action="{{ route('transaction.new') }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-6">
                                <label for="clientName" class="form-label">Nom du Client</label>
                                <input required name="customer" type="text" class="form-control" id="clientName"
                                    placeholder="Nom Complet">
                            </div>
                            <div class="col-3">
                                <label class="form-label">Nature de l'Operation</label>
                                <select name="provider" class="form-select" data-choices data-choices-sorting="true"
                                    id="inlineFormSelectPref">
                                    <option value="AIRTEL_MONEY">Airtel Money</option>
                                    <option value="ORANGE_MONEY">Orange Money</option>
                                    <option value="M_PESA">M Pesa</option>
                                    <option value="MONEY_GRAM">Money Gram</option>
                                    <option value="WESTERN_UNION">Western Union</option>
                                </select>
                            </div>
                            <div class="col-3">
                                <label class="form-label">Type d'Operation</label>
                                <select name="type" class="form-select" data-choices data-choices-sorting="true"
                                    id="inlineFormSelectPref">
                                    <option value="deposit">Depot</option>
                                    <option value="withdraw">Retrait</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="clientName" class="form-label">Montant</label>
                                <input required name="amount" type="number" class="form-control" id="clientName"
                                    placeholder="Montant">
                            </div>
                            <div class="col-6">
                                <label class="form-label">Devise</label>
                                <select name="currency_id" class="form-select" data-choices data-choices-sorting="true"
                                    id="inlineFormSelectPref" onchange="changeData(this)">
                                    @foreach ($currencies as $c)
                                        <option value="{{ $c->id }}">{{ $c->symbol }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h5>Billetage</h5>
                            <div id="billets-container">

                            </div>
                            <button class="btn btn-block btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function changeData(select) {
            // Get the selected value.
            var selectedValue = select.options[select.selectedIndex].value;
            // Fetch the data that you want to display.
            $.ajax({
                url: '/currenceies/billets',
                type: 'GET',
                data: {
                    currencyId: selectedValue
                },
                success: function(data) {

                    $('#billets-container').html(data.view);
                }
            });
        }
    </script>
@endsection
