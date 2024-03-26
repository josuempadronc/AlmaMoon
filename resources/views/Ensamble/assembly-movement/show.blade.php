@extends('layouts.app')


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">Movimiento</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('assembly-movements.index') }}">
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
                                <input type="text" class="form-control" value=" {{ $assemblyMovement->date }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $assemblyMovement->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovement->order }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $assemblyMovement->note }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovement->finishedProduct->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovement->amount }}" disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovement->colors->id }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $assemblyMovement->origin->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $assemblyMovement->movementDeatil->name }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control"
                                    value="{{ $assemblyMovement->location->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $assemblyMovement->observation }}" disabled
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
