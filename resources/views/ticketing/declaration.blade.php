@extends('layouts.master')

@section('content')
    @if (count($ticketings) > 0)
        <div class="row">
            @foreach ($ticketings as $t)
                <div class="col-md-3">
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="fw-medium text-muted mb-0">{{ $t->billet->amount }}
                                        {{ $t->billet->currency->symbol }}
                                    </p>
                                    <h2 class="mt-4 ff-secondary fw-semibold">{{ $t->qty }}
                                    </h2>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div> <!-- end card-->
                </div>
            @endforeach

        </div>
    @else
        <form action="{{ route('ticketing.declare') }}" method="post">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Monnaie Locale</h4>
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="row">
                                @csrf
                                @foreach ($billetsFrancs as $key => $billet)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">{{ $billet->currency->symbol }}</span>
                                        <span class="input-group-text">{{ $billet->amount }}</span>
                                        <input name="{{ $billet->id }}" min="0" type="number" value="0"
                                            class="form-control" aria-label="Nombre de billets">
                                    </div>
                                @endforeach
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
                                @csrf
                                @foreach ($billetsDollars as $key => $billet)
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">{{ $billet->currency->symbol }}</span>
                                        <span class="input-group-text">{{ $billet->amount }}</span>
                                        <input min="0" name="{{ $billet->id }}" type="number" value="0"
                                            class="form-control" aria-label="Nombre de billets">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-block btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
    @endif
@endsection
