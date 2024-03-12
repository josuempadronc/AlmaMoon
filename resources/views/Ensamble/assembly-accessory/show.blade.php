@extends('layouts.app')

@section('template_title')
    {{ $assemblyAccessory->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $assemblyAccessory->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('assembly-accessories.index') }}">
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
                                <input type="text" class="form-control" value="{{ $assemblyAccessory->name }}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Color</label>
                                <input type="text" class="form-control" value="{{ $assemblyAccessory->color_id }}" disabled readonly>
                            </div>
                            <div class="mb-3">
                                <label for="formGroupExampleInput" class="form-label">Cantidad</label>
                                <input type="text" class="form-control" value=" {{ $assemblyAccessory->amount }}" disabled readonly>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
