@extends('layouts.app')

@section('template_title')
    {{ $color->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">{{ $color->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('color.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <div class="col mt-2">
                                <span class="card-title">Nombre</span>
                                <input type="text" class="form-control" value=" {{ $color->name }}" disabled readonly>
                              </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
