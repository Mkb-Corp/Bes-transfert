@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Repartition du Billetage</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1">Repartition</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <p class="text-muted">Use <code>col-sm-</code> class with required size value to set column size as per your
                    requirement.</p>
                <div class="live-preview">
                    <form action="{{ route('ticketing.dispatching') }}" method="post">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12-6">
                                <label class="form-label">Guichet</label>
                                <select name="counter_id" class="form-select" data-choices data-choices-sorting="true"
                                    id="inlineFormSelectPref">
                                    @foreach ($counters as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @foreach ($ticketings as $t)
                                <div class="col-sm-6">
                                    <label class="form-label">Billets de {{ $t->billet->amount }}
                                        {{ $t->billet->currency->symbol }}</label>
                                    <input required name="{{ $t->billet->id }}" type="number" min="0"
                                        max="{{ $t->qty }}" class="form-control" id="employeeName"
                                        placeholder="Billets disponibles : {{ $t->qty }}">
                                </div>
                            @endforeach
                            <button class="btn btn-block btn-primary" type="submit">Enregistrer</button>
                        </div>
                    </form>
                    <!--end row-->
                </div>
            </div>
        </div>
    </div>
@endsection
