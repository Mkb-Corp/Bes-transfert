@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Monnaie Locale</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="" method="post">
                            @csrf
                            @foreach ($billetsFrancs as $billet)
                                <div class="input-group mb-3">
                                    <span class="input-group-text">CDF</span>
                                    <span class="input-group-text">{{ $billet->amount }}</span>
                                    <input min="0" type="number" class="form-control"
                                        aria-label="Nombre de billets">
                                </div>
                            @endforeach
                        </form>
                        <button class="btn btn-block btn-primary" type="submit">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Devise étrangère</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="row">
                        <form action="" method="post">
                            @csrf
                            @foreach ($billetsDollars as $billet)
                                <div class="input-group mb-3">
                                    <span class="input-group-text">USD</span>
                                    <span class="input-group-text">{{ $billet->amount }}</span>
                                    <input min="0" type="number" class="form-control"
                                        aria-label="Nombre de billets">
                                </div>
                            @endforeach
                        </form>
                        <button class="btn btn-block btn-primary" type="submit">Enregistrer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
