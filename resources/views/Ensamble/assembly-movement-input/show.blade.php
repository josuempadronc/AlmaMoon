@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">
                                <h3>Movimineto de Insumo</h3>
                            </span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('assembly-movement-inputs.index') }}">
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
                                <input type="text" class="form-control" value=" {{ $assemblyMovementInput->date }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->order }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $assemblyMovementInput->order }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->note }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->input->name }}" disabled readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->amount }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->colors->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->origin->name }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control"
                                    value=" {{ $assemblyMovementInput->movementDeatil->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $assemblyMovementInput->location->name }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control"
                                    value=" {{ $assemblyMovementInput->observation }}" disabled readonly>
                            </div>
                            <div class="col m-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
