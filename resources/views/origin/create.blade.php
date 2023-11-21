@extends('layouts.app')

@section('template_title')
    Crear Origen
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Nuevo Origen</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('origins.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('origins.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('origin.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
