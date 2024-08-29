@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Consumo</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('paint-consumptions.index') }}">
                                <i class="bi bi-backspace"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->date }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $paintMovement->order }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->ProductOrMaterial }}"
                                disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->amount }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $paintMovement->measure->name}}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->Product }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->amountProduct }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->type }}" disabled readonly>

                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $paintConsumption->observation }}"
                                disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
