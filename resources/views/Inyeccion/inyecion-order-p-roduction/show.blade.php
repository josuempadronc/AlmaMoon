@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Inyecion Order P Roduction</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inyecion-order-p-roductions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionOrderPRoduction->date }}" disabled readonly>
                            </div>

                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionOrderPRoduction->order }}"
                                    disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionOrderPRoduction->finishedProduct->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionOrderPRoduction->color->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="{{ $inyecionOrderPRoduction->paw->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value="  {{ $inyecionOrderPRoduction->amount }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionOrderPRoduction->amountToManofacture }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <input type="text" class="form-control" value=" {{ $inyecionOrderPRoduction->amountManofacture }}" disabled
                                    readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col m-2">
                                <input type="text" class="form-control"
                                    value="{{ $inyecionOrderPRoduction->observation }}" disabled readonly>
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
