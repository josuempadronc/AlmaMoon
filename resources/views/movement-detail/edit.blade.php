@extends('layouts.app')

@section('template_title')
   Actualizar Detalle del Movimineto
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Actualiar Detalle de Movimiento</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('movement-details.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('movement-details.update', $movementDetail->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('movement-detail.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
