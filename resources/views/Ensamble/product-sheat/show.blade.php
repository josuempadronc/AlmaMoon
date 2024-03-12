@extends('layouts.app')

@section('template_title')
    {{ $productSheat->name ?? "{{ __('Show') Product Sheat" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Sheat</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product-sheats.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $productSheat->name }}
                        </div>
                        <div class="form-group">
                            <strong>Color Id:</strong>
                            {{ $productSheat->color_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
