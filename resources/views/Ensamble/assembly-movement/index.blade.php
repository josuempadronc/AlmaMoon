@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Moviminetos Productos') }}
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('assembly-movements.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('assembly-movements.create') }}"
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

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($assemblyMovements) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo de Movimiento</th>
                                            <th>No Orden</th>
                                            <th>No Nota</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Color</th>
                                            <th>Origen</th>
                                            <th>Detalle</th>
                                            <th>Ubicacion</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($assemblyMovements as $assemblyMovement)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $assemblyMovement->date }}</td>
                                                <td>{{ $assemblyMovement->typeMovement_id }}</td>
                                                <td>{{ $assemblyMovement->order }}</td>
                                                <td>{{ $assemblyMovement->note }}</td>
                                                <td>{{ $assemblyMovement->finishedProduct_id }}</td>
                                                <td>{{ $assemblyMovement->amount }}</td>
                                                <td>{{ $assemblyMovement->color_id }}</td>
                                                <td>{{ $assemblyMovement->origin_id }}</td>
                                                <td>{{ $assemblyMovement->movementDeatil_id }}</td>
                                                <td>{{ $assemblyMovement->location_id }}</td>
                                                <td>{{ $assemblyMovement->observation }}</td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('assembly-movements.destroy', $assemblyMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('assembly-movements.show', $assemblyMovement->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('assembly-movements.edit', $assemblyMovement->id) }}">
                                                                    <i class="bi bi-pencil-fill"></i>
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
                                                                action="{{ route('assembly-movements.destroy', $assemblyMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('assembly-movements.show', $assemblyMovement->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
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
                {!! $assemblyMovements->links() !!}
            </div>
        </div>
    </div>
@endsection
