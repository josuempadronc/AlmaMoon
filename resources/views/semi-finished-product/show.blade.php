@extends('layouts.app')

@section('template_title')
    {{ $semiFinishedProduct->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $semiFinishedProduct->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('semi-finished-products.index') }}">
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
                                <input type="text" class="form-control" value=" {{ $semiFinishedProduct->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $semiFinishedProduct->color->name }}"
                                    disabled readonly>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" value=" {{ $semiFinishedProduct->stock }}"
                                    disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
