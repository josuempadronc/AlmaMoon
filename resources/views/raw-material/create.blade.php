@extends('layouts.app')

@section('template_title')
    Crear Materia Prima
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Nuevo Materia Prima</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('raw-materials.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('raw-materials.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('raw-material.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
