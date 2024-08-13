@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Materia </span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sewing-consumption-semifinisheds.index') }}">
                                <i class="bi bi-backspace"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $sewingConsumptionSemifinished->date }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $sewingConsumptionSemifinished->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $sewingConsumptionSemifinished->SemifinishedProduct->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $sewingConsumptionSemifinished->amount }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $sewingConsumptionSemifinished->Product }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $sewingConsumptionSemifinished->amountPro }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $sewingRawMaterial->AmountRoll }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $sewingRawMaterial->AmountMts }}"
                                    disabled readonly>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Date:</strong>

                        </div>
                        <div class="form-group">
                            <strong>Typemovement Id:</strong>

                        </div>
                        <div class="form-group">
                            <strong>Semifinishedproduct Id:</strong>

                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>

                        </div>
                        <div class="form-group">
                            <strong>Product:</strong>

                        </div>
                        <div class="form-group">
                            <strong>Amountpro:</strong>

                        </div>
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $sewingConsumptionSemifinished->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Observation:</strong>
                            {{ $sewingConsumptionSemifinished->observation }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
