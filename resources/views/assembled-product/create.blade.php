@extends('layouts.app')

@section('template_title')
    Nuevo Producto Ensamblado
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Nuevo Producto Ensamblado</span>
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
                        <form method="POST" action="{{ route('assembled-products.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('assembled-product.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
