@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Mechanics Semifinished
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Actualizar Producto Semi Terminado</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('mechanics-semifinisheds.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('mechanics-semifinisheds.update', $mechanicsSemifinished->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('MetalMecanica/mechanics-semifinished.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
