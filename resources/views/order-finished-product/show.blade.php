@extends('layouts.app')

@section('template_title')
    {{ $orderFinishedProduct->name ?? "{{ __('Show') Order Finished Product" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Order Finished Product</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('order-finished-products.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Order Id:</strong>
                            {{ $orderFinishedProduct->order_id }}
                        </div>
                        <div class="form-group">
                            <strong>Finished Product Id:</strong>
                            {{ $orderFinishedProduct->finished_product_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
