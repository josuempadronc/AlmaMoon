@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Movimiento </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mechanics-movements.index') }}">
                                <i class="bi bi-backspace"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="  {{ $mechanicsMovement->date }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->note }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->order }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->supplier->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value="  {{ $mechanicsMovement->Product }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="  {{ $mechanicsMovement->amountUnd }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->amountMts }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->amountKg }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->origin->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsMovement->observation }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
