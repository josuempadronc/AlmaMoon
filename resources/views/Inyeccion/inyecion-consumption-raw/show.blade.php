@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Consuno</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inyecion-consumption-raws.index') }}">
                                <i class="bi bi-backspace"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionConsumptionRaw->date }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionConsumptionRaw->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionConsumptionRaw->order }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionConsumptionRaw->orderProduction }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionConsumptionRaw->Maquina }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionConsumptionRaw->finishedProduct->name }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionConsumptionRaw->rawMaterial->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionConsumptionRaw->amount }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionConsumptionRaw->destination->name }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionConsumptionRaw->observation }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                {{-- <input type="text" class="form-control" value=" {{ $assemblyMovement->observation }}" disabled
                                    readonly> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
