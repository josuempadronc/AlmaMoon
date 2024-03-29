@extends('layouts.app')

@section('template_title')
    Nuevo Color
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> Nuevo Color</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        @auth
                                            @if (auth()->user()->role === '1')
                                            <a class="btn btn-primary" href="{{ route('color.index') }}">
                                                <i class="bi bi-backspace"></i>
                                            </a>
                                            @endif
                                            @if (auth()->user()->role === '2')
                                            <a class="btn btn-primary" href="{{ route('color.index') }}">
                                                <i class="bi bi-backspace"></i>
                                            </a>
                                            @endif
                                            @if (auth()->user()->role === '7')
                                            <a class="btn btn-primary" href="{{ route('color.index') }}">
                                                <i class="bi bi-backspace"></i>
                                            </a>
                                            @endif

                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('color.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('color.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
