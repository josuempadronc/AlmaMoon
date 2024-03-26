@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title"> {{ $productSheat->name }}</span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('product-sheats.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body height: 600px; overflow:auto;">
                        <div class="row">
                            <div class="col m-2">
                                <label for="formGroupExampleInput" class="form-label">Nombre</label>
                                <input type="text" class="form-control" value=" {{ $productSheat->name }}" disabled
                                    readonly>
                            </div>
                            <div class="col m-2">
                                <label for="formGroupExampleInput" class="form-label">Color</label>
                                <input type="text" class="form-control" value="{{ $productSheat->color->name }}" disabled
                                    readonly>
                            </div>
                        </div>
                        @if ($productComponents)
                            @foreach ($productComponents as $index => $productComponent)
                                <div class="row">
                                    <div class="col m-2">
                                        <label for="formGroupExampleInput" class="form-label">Insumo</label>
                                        <input type="text" class="form-control"
                                            value=" {{ optional($productComponent->pivot->assembly_input_id)->name }}" disabled
                                            readonly>
                                    </div>
                                    <div class="col m-2 ">
                                        <label for="formGroupExampleInput" class="form-label">Cantidad</label>
                                        <input type="text" class="form-control"
                                            value="{{ $productComponent->pivot->amount }}" disabled readonly>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
