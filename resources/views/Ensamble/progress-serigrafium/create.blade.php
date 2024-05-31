@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Progress Serigrafium
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">Nuevo Progreso</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('progress-serigrafia.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('progress-serigrafia.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('Ensamble/progress-serigrafium.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
