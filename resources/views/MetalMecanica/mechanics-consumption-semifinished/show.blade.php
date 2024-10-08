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
                            <a class="btn btn-primary" href="{{ route('mechanicsconsumptionsemifinisheds.index') }}">
                                <i class="bi bi-backspace"></i>
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="  {{ $mechanicsConsumptionSemifinished->date }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumptionSemifinished->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $mechanicsConsumptionSemifinished->semiFinished->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value="  {{ $mechanicsConsumptionSemifinished->amountRoll }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $mechanicsConsumptionSemifinished->product->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value="{{ $mechanicsConsumptionSemifinished->amountProduct }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $mechanicsConsumptionSemifinished->observation }}" disabled
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
