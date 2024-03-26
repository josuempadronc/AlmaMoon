@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $assemblyStructure->name_input }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('assembly-structures.index') }}">
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
                            {{ $assemblyStructure->input->name }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $assemblyStructure->input->color }}
                        </div>
                        <div class="form-group">
                            <strong>Accesorio:</strong>
                            {{ $assemblyStructure->accessory->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $assemblyStructure->amount }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
