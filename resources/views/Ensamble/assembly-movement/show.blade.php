@extends('layouts.app')

@section('template_title')
    {{ $assemblyMovement->name ?? "{{ __('Show') Assembly Movement" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Assembly Movement</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('assembly-movements.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $assemblyMovement->date }}
                        </div>
                        <div class="form-group">
                            <strong>Typemovement Id:</strong>
                            {{ $assemblyMovement->typeMovement_id }}
                        </div>
                        <div class="form-group">
                            <strong>Order:</strong>
                            {{ $assemblyMovement->order }}
                        </div>
                        <div class="form-group">
                            <strong>Note:</strong>
                            {{ $assemblyMovement->note }}
                        </div>
                        <div class="form-group">
                            <strong>Finishedproduct Id:</strong>
                            {{ $assemblyMovement->finishedProduct_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $assemblyMovement->amount }}
                        </div>
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $assemblyMovement->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Origin Id:</strong>
                            {{ $assemblyMovement->origin_id }}
                        </div>
                        <div class="form-group">
                            <strong>Movementdeatil Id:</strong>
                            {{ $assemblyMovement->movementDeatil_id }}
                        </div>
                        <div class="form-group">
                            <strong>Location Id:</strong>
                            {{ $assemblyMovement->location_id }}
                        </div>
                        <div class="form-group">
                            <strong>Observation:</strong>
                            {{ $assemblyMovement->observation }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
