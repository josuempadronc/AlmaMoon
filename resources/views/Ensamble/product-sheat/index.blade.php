@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ficha Producto') }}
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('product-sheats.create') }}" class="btn btn-primary btn-sm float-right"
                                            data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('product-sheats.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body" style=" height: 600px !important; overflow: auto;">
                        <div class="table-responsive">
                            @if (count($productSheats) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            {{-- <th>No</th> --}}

                                            <th>Nombre</th>
                                            <th>Color</th>
                                            <th>Insumo</th>
                                            <th>Cantidad</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productSheats as $productSheat)
                                            <tr>
                                                {{-- <td>{{ ++$i }}</td> --}}

                                                <td>{{ $productSheat->name }}</td>
                                                <td>{{ $productSheat->color->name }}</td>
                                                <td>
                                                    @foreach ($productSheat->assemblyInputs as $productComponent)
                                                        <ul>
                                                            {{ $productComponent->pivot->assembly_input_id }}
                                                        </ul>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach ($productSheat->assemblyInputs as $productComponent)
                                                        <ul>
                                                            {{ $productComponent->pivot->amount }}
                                                        </ul>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('product-sheats.destroy', $productSheat->id) }}"
                                                                method="POST">
                                                                <div class="d-flex">
                                                                    <div>
                                                                        <a class="btn btn-sm btn-primary m-2"
                                                                            href="{{ route('product-sheats.show', $productSheat->id) }}">
                                                                            <i class="bi bi-eye-fill"></i>
                                                                        </a>
                                                                        <a class="btn btn-sm btn-success"
                                                                            href="{{ route('product-sheats.edit', $productSheat->id) }}">
                                                                            <i class="bi bi-pencil-fill"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                <a type="button" class="btn btn-sm btn-warning m-2"
                                                                    href="{{ route('product-sheats.edit', $productSheat->id) }}"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <i class="bi bi-calculator-fill"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if (auth()->user()->role === '3')
                                                            <form
                                                                action="{{ route('product-sheats.destroy', $productSheat->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('product-sheats.show', $productSheat->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a type="button" class="btn btn-sm btn-warning m-2"
                                                                    href="{{ route('product-sheats.edit', $productSheat->id) }}"
                                                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <i class="bi bi-calculator-fill"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                    @endauth

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h4 class="text-center">No hay registros</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresa la Cantidad</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="calcular" method="POST" action="{{ route('product-sheats.calculator', $productSheat->id) }}"
                    role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input class="p-1 mx-5 w-75" type="number" id="cantidad_total" name="cantidad_total">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Calcular</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Datos de respuesta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido de la modal -->
                    {{-- <ul>
                        @foreach ($totals as $total)
                            <li>{{ $total['input'] }}: {{ $total['value'] }}</li>
                        @endforeach
                    </ul> --}}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Script para mostrar la modal -->
    <script>
        $(document).ready(function() {
            // Muestra la modal automáticamente al cargar la página
            $('#myModal').modal('show');
        });
    </script>
@endsection
