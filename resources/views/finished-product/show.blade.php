@extends('layouts.app')

@section('template_title')
    {{ $finishedProduct->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $finishedProduct->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('finished-products.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" value="{{ $finishedProduct->name }}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Color</label>
                                <input type="text" class="form-control" value="{{ $finishedProduct->color->name }}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Patas</label>
                                <input type="text" class="form-control" value="{{ $finishedProduct->paw->name }}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Cantidad</label>
                                <input type="text" class="form-control" value="{{ $finishedProduct->stock }}" disabled readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
