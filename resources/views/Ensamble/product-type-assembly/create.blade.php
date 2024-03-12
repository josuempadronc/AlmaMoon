@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Product Type Assembly
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Product Type Assembly</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('product-type-assemblies.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('product-type-assembly.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
