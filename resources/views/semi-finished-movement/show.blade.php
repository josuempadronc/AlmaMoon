@extends('layouts.app')

@section('template_title')
    {{ $semiFinishedMovement->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $semiFinishedMovement->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('semi-finished-movements.index') }}">
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
                                <input type="text" class="form-control" value=" {{ $semiFinishedMovement->date }}"
                                    disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control"
                                    value=" {{ $semiFinishedMovement->typeMovement_id }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $semiFinishedMovement->code }}"
                                    disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control"
                                    value=" {{ $semiFinishedMovement->order }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $semiFinishedMovement->batch }}"
                                    disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control"
                                    value="  {{ $semiFinishedMovement->supplier_id }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $semiFinishedMovement->SemifinishedProduct_id }}"
                                    disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control"
                                    value="  {{ $semiFinishedMovement->amount }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $semiFinishedMovement->measures_id }}"
                                    disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control"
                                    value="  {{ $semiFinishedMovement->origin_id }}" disabled readonly>
                            </div>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" value=" {{ $semiFinishedMovement->destination_id }}"
                                disabled readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
