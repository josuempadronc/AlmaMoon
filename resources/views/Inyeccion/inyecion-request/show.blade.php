@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Requerimiento</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inyecion-requests.index') }}">
                                <i class="bi bi-backspace"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionRequest->date }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionRequest->typeMovement->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionRequest->order }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionRequest->finishedProduct->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionRequest->color->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionRequest->paw->name }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionRequest->amount }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionRequest->amountToManofacture }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionRequest->amountManofacture }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control"
                                    value="{{ $inyecionRequest->observation }}" disabled readonly>
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
