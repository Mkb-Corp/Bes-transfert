@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Guichets</h4>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach ($counters as $counter)
            <div class="col-xl-3 col-md-6">
                <!-- card -->
                <div class="card card-animate">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase fw-medium text-muted mb-0">
                                    @if (($counter->user !== null))
                                        {{ $counter->user->name }}
                                    @else
                                        {{ "Pas d'agent" }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="d-flex align-items-end justify-content-between mt-4">
                            <div>
                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">{{ $counter->name }}</h4>
                            </div>
                            <div class="avatar-sm flex-shrink-0">
                                <span class="avatar-title bg-soft-success rounded fs-3">
                                    <i class="bx bx-dollar-circle text-success"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div>
        @endforeach
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Assigner Utilisateur</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Assigner utilisateur au guichet</p>
                    <div class="live-preview">
                        <form action="{{ route('assign_user') }}" method="POST">
                            @csrf
                            <div class="row row-cols-lg-auto g-3 align-items-center">

                                <!--end col-->
                                <div class="col-12">
                                    <label for="inlineFormSelectPref">Guichet</label>
                                    <select name="counter_id" class="form-select" data-choices data-choices-sorting="true"
                                        id="inlineFormSelectPref">
                                        @foreach ($counters as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inlineFormSelectPref">Agent</label>
                                    <select name="agent_id" class="form-select" data-choices data-choices-sorting="true"
                                        id="inlineFormSelectPref">
                                        @foreach ($agents as $a)
                                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Enregistrer</button>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <!--end card-body-->
            </div>
            <!--end card-->
        </div> <!-- end col -->
    </div>
@endsection
