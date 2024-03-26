@extends('layouts.app')

@section('template_title')
    {{ $productComponent->name ?? "{{ __('Show') Product Component" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Component</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product-components.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Product Sheat Id:</strong>
                            {{ $productComponent->product_sheat_id }}
                        </div>
                        <div class="form-group">
                            <strong>Input Id:</strong>
                            {{ $productComponent->input_id }}
                        </div>
                        <div class="form-group">
                            <strong>Amount:</strong>
                            {{ $productComponent->amount }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
