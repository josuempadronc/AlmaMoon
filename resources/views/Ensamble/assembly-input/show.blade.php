@extends('layouts.app')

@section('template_title')
    {{ $assemblyInput->name ?? "{{ __('Show') Assembly Input" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Assembly Input</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('assembly-inputs.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $assemblyInput->name }}
                        </div>
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $assemblyInput->color_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $assemblyInput->amount }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
