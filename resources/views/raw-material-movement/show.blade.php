@extends('layouts.app')

@section('template_title')
    {{ $rawMaterialMovement->name ?? }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">{{ $rawMaterialMovement->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('raw-material-movements.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->date }}" disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->typeMovement_id }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->order }}" disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->consumption }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->businessName }}" disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->supplier_id }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->rawMaterial }}" disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->amount }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->origin_id }}" disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->destination_id }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->location_id }}" disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $rawMaterialMovement->observation }}" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
