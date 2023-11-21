@extends('layouts.app')

@section('template_title')
    {{ $assembledProduct->name }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $assembledProduct->name }}</span>
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
                        <div class="col mt-2">
                            <input type="text" class="form-control" value=" {{ $assembledProduct->name }}">
                          </div>
                        <div class="row g-3 mt-2">
                            <div class="col">
                              <input type="text" class="form-control" value="{{ $assembledProduct->semifinishedProduct->name }}">
                            </div>
                            <div class="col">
                              <input type="text" class="form-control" value="{{ $assembledProduct->amount }}">
                            </div>
                          </div>
                          <div class="col mt-2">
                            <input type="text" class="form-control" value=" {{ $assembledProduct->Observation }}">
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
