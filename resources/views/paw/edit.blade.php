@extends('layouts.app')

@section('template_title')
   Actualizar Pata
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Pata</span>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('paws.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('paws.update', $paw->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('paw.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
