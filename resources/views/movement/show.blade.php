@extends('layouts.app')

@section('template_title')
    {{-- {{ $movement->name }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">
                                <h3>{{ $movement->name }}</h3>
                            </span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('movements.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $movement->date }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value="{{ $movement->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->movementDetail->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $movement->code }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->order }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->batch }}" disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->businessName }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->location->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->origin->name }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control"
                                    value="{{ optional($movement->FinishedProduct)->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->amount }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control"
                                    value="{{ optional($movement->Destination)->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $movement->observation }}" disabled
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
