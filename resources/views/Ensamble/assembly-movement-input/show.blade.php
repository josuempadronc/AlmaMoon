@extends('layouts.app')

@section('template_title')
    {{ $assemblyMovementInput->name ?? "{{ __('Show') Assembly Movement Input" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Assembly Movement Input</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('assembly-movement-inputs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $assemblyMovementInput->date }}
                        </div>
                        <div class="form-group">
                            <strong>Typemovement Id:</strong>
                            {{ $assemblyMovementInput->typeMovement_id }}
                        </div>
                        <div class="form-group">
                            <strong>Order:</strong>
                            {{ $assemblyMovementInput->order }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $assemblyMovementInput->note }}
                        </div>
                        <div class="form-group">
                            <strong>Input Id:</strong>
                            {{ $assemblyMovementInput->input_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $assemblyMovementInput->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $assemblyMovementInput->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Origin Id:</strong>
                            {{ $assemblyMovementInput->origin_id }}
                        </div>
                        <div class="form-group">
                            <strong>Movementdeatil Id:</strong>
                            {{ $assemblyMovementInput->movementDeatil_id }}
                        </div>
                        <div class="form-group">
                            <strong>Location Id:</strong>
                            {{ $assemblyMovementInput->location_id }}
                        </div>
                        <div class="form-group">
                            <strong>Observation:</strong>
                            {{ $assemblyMovementInput->observation }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
