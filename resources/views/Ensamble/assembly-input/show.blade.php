@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $assemblyInput->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('assembly-inputs.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $assemblyInput->name }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $assemblyInput->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $assemblyInput->amount }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
