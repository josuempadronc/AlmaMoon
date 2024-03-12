@php
    $dashboardAlamacen = Dashboard();
    // dd($dashboardAlamacen['orders']);
@endphp
@extends('layouts.app')
@section('content')
    <div class="mt-0">
        <div class="row mt-0">
            <div class="">
                <h1 class="text-center ">
                    Ensamble
                </h1>
            </div>
            <div class="row" style="height: 615px; position: relative; overflow: auto;">
                <div class="continer col ms-3">
                    {{-- Producto Terminado --}}
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#Producto_Terminado" aria-expanded="false" aria-controls="Producto_Terminado">
                            Producto Terminado
                        </button>
                    </p>
                    <div class="collapse shadow mb-5 bg-body-tertiary rounded" id="Producto_Terminado">
                        <div class="card card-body">
                            @if (count($dashboardAlamacen['groupProduct']) !== 0)
                                <div class="row row-cols-md-4">
                                    @foreach ($dashboardAlamacen['groupProduct'] as $key => $item)
                                        <div class="col me-3">
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#{{ str_replace(' ', '_', $key) }}">
                                                <div class="card h-100 bg-primary rounded-2"
                                                    style="min-width: 15rem; max-width: 15rem;">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <h5 class="card-title mx-3 mt-3 text-white">
                                                                {{ $key }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h4 class="text-center">No hay registros</h4>
                            @endif
                        </div>
                    </div>
                    {{-- End Producto Terminado --}}
                    {{-- Producto SemiTerminado --}}
                    <p class="d-inline-flex gap-1">
                        <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#Producto_Semiterminado" aria-expanded="false"
                            aria-controls="Producto_Semiterminado">
                            Producto SemiTerminado
                        </button>
                    </p>
                    <div class="collapse shadow mb-5 bg-body-tertiary rounded" id="Producto_Semiterminado">
                        <div class="card card-body">
                            @if (count($dashboardAlamacen['groupProductSemi']) !== 0)
                                <div class="row row-cols-md-4">
                                    @foreach ($dashboardAlamacen['groupProductSemi'] as $key => $item)
                                        <div class="col me-3">
                                            <button type="button" class="btn" data-bs-toggle="modal"
                                                data-bs-target="#{{ str_replace(' ', '_', $key) }}">
                                                <div class="card h-100 bg-primary rounded-2"
                                                    style="min-width: 15rem; max-width: 15rem;">
                                                    <div class="card-body">
                                                        <div class="d-flex">
                                                            <h5 class="card-title mx-3 mt-3 text-white">
                                                                {{ $key }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h4 class="text-center">No hay registros</h4>
                            @endif
                        </div>
                    </div>
                    {{-- End Producto SemiTerminado --}}
                </div>
                <div class="container col col-lg-2 mt-3 me-3">
                    <div class="container text-center">
                        <h4>Pedidos</h4>
                    </div>
                    <div class="despacho shadow mb-1 bg-body-tertiary rounded">
                        @if (count($dashboardAlamacen['orders']) !== 0)
                            @foreach ($dashboardAlamacen['orders'] as $orders)
                                <div class="card m-2 shadow mb-3 bg-body-tertiary rounded">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $orders->name }}</h5>
                                        {{-- <p class="card-text">{{ optional($orders->Destination)->name }} </p> --}}
                                        <p class="card-text"> <strong>Status:</strong> {{ $orders->status }}</p>
                                        <!-- Formulario para cambiar el estado -->
                                        <form method="POST" action="{{ route('orders.actualizar', $orders->id) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-check d-flex" style="padding: 0; margin-left: -15px;">
                                                <button type="submit" class="btn">
                                                    <label class="btn btn-outline-primary" for="btncheck2">Despachado</label>
                                                    <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                                </button>
                                                <a class="btn btn-primary mt-2" style="height: 36px;" href="{{ route('orders.show', $orders->id) }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>
                                            </div>


                                        </form>


                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h4 class="text-center p-5 mt-5">No hay registros</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- Producto Terminado --}}
        @foreach ($dashboardAlamacen['groupProduct'] as $key => $items)
            <div class="modal modal-lg" id="{{ str_replace(' ', '_', $key) }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $key }}</h1>
                            <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover border rounded">
                                    <thead class="thead">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Color</th>
                                            <th>Patas</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                {{-- <td>{{ ++$i }}</td> --}}
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->color->name }}</td>
                                                <td>{{ $item->paw->name }}</td>
                                                <td>{{ $item->stock }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- End Producto Terminado --}}
        {{-- Producto SemiTerminado --}}
        @foreach ($dashboardAlamacen['groupProductSemi'] as $key => $items)
            <div class="modal modal-lg" id="{{ str_replace(' ', '_', $key) }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $key }}</h1>
                            <button type="button" class="btn-close bg-danger" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover border rounded">
                                    <thead class="thead">
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Color</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                                {{-- <td>{{ ++$i }}</td> --}}
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->color->name }}</td>
                                                <td>{{ $item->stock }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- End Producto SemiTerminado --}}
    </div>
@endsection
