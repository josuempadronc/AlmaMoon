@extends('layouts.app')

@section('template_title')
    {{ $productTypeAssembly->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Product Type Assembly</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product-type-assemblies.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $productTypeAssembly->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
