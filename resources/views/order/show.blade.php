@extends('layouts.app')

@section('template_title')
    {{-- {{ $order->name ?? "{{ __('Show') Order" }} --}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span class="card-title">
                                <h3 class="ms-5 mt-2">{{ $order->name }}</h3>
                            </span>
                            <div class="float-right">
                                <div class="float-right">
                                    <div class="float-right">
                                        <a class="btn btn-primary" href="{{ route('orders.index') }}">
                                            <i class="bi bi-backspace"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body" style="height: 600px; overflow:auto;">
                        <div class="row">
                            <div class="col m-2">
                                <label for="formGroupExampleInput" class="form-label">Cliente</label>
                                <input type="text" class="form-control" value=" {{ $order->name }}" disabled readonly>
                            </div>
                            <div class="col m-2 m-2">
                                <label for="formGroupExampleInput" class="form-label">Rif / Ci</label>
                                <input type="text" class="form-control" value="{{ $order->rif }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <label for="formGroupExampleInput" class="form-label">Destino</label>
                                <input type="text" class="form-control" value="{{ optional($order->Destination)->name }}"
                                    disabled readonly>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col m-2">
                                <label for="formGroupExampleInput" class="form-label">Tipo</label>
                                <input type="text" class="form-control"
                                    value="{{ optional($order->movementDetail)->name }}" disabled readonly>
                            </div>
                            <div class="col m-2">
                                <label for="formGroupExampleInput" class="form-label">Status</label>
                                <input type="text" class="form-control" value=" {{ $order->status }}" disabled readonly>
                            </div>
                        </div>
                        <div class="row">
                            @if ($orderFinishedProducts)
                                @foreach ($orderFinishedProducts as $index => $orderFinishedProduct)
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="producto">Producto</label>
                                                <input type="text" class="form-control" id="producto" value="{{ $orderFinishedProduct->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="color">Color</label>
                                                <input type="text" class="form-control" id="color" value="{{ $orderFinishedProduct->color->name }}" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="cantidad">Cantidad</label>
                                                <input type="text" class="form-control" id="cantidad" value="{{ $orderFinishedProduct->pivot->amount }}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
