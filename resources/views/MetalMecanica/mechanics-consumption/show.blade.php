@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Consumo </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('mechanics-consumptions.index') }}">
                                <i class="bi bi-backspace"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="  {{ $mechanicsConsumption->date }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumption->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumption->order }}"
                                disabled readonly>

                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumption->rawMaterial->name }}" disabled
                                readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="  {{ $mechanicsConsumption->amountRoll }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value="   {{ $mechanicsConsumption->amountMts }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumption->Product }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumption->amountProduct }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $mechanicsConsumption->TypeProduct }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value="{{ $mechanicsConsumption->location_id }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumption->observation }}" disabled
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
