@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="card-title">Nuevo Progreso</span>
                        <div class="float-right">
                            <div class="float-right">
                                <div class="float-right">
                                    <a class="btn btn-primary" href="{{ route('progress-vulcanizado.index') }}">
                                        <i class="bi bi-backspace"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('progress-vulcanizado.update', $progressVulcanizado->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('Ensamble/progress-vulcanizado.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
