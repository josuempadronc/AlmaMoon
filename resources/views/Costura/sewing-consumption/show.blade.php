@extends('layouts.app')

@section('template_title')
    {{ $sewingConsumption->name ?? "{{ __('Show') Sewing Consumption" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sewing Consumption</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sewing-consumptions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Date:</strong>
                            {{ $sewingConsumption->date }}
                        </div>
                        <div class="form-group">
                            <strong>Typemovement Id:</strong>
                            {{ $sewingConsumption->typeMovement_id }}
                        </div>
                        <div class="form-group">
                            <strong>Rawmaterial Id:</strong>
                            {{ $sewingConsumption->rawMaterial_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amountroll:</strong>
                            {{ $sewingConsumption->amountRoll }}
                        </div>
                        <div class="form-group">
                            <strong>Amountmts:</strong>
                            {{ $sewingConsumption->amountMts }}
                        </div>
                        <div class="form-group">
                            <strong>Product:</strong>
                            {{ $sewingConsumption->Product }}
                        </div>
                        <div class="form-group">
                            <strong>Amountproduct:</strong>
                            {{ $sewingConsumption->amountProduct }}
                        </div>
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $sewingConsumption->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Typeproduct:</strong>
                            {{ $sewingConsumption->TypeProduct }}
                        </div>
                        <div class="form-group">
                            <strong>Observation:</strong>
                            {{ $sewingConsumption->observation }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
