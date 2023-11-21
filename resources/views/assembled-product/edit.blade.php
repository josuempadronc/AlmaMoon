@extends('layouts.app')

@section('template_title')
    {{ $assembledProduct->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">{{ $assembledProduct->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <a class="btn btn-primary float-right" href="{{ route('assembled-products.index') }}">
                                        <i class="bi bi-backspace"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('assembled-products.update', $assembledProduct->id) }}"
                            role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('assembled-product.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
