@extends('layouts.app')

@section('template_title')
    Movimiento Producto Terminado
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success position-fixed h-20 w-25 top-10 z-1" style="left: 46%;">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Movimiento Producto Terminado
                            </span>

                            <div class="float-right">
                                <a href="{{ route('movements.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style=" height: 600px !important; overflow: auto;">
                        <div class="table-responsive">
                            @if (count($movements) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Detalle</th>
                                            <th>Codigo</th>
                                            <th>Orden</th>
                                            <th>Lote</th>
                                            <th>Cliente</th>
                                            <th>Ubicacion</th>
                                            <th>Origen</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Destino</th>
                                            <th>Observacion</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($movements as $movement)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $movement->date }}</td>
                                                <td>{{ $movement->typeMovement->name }}</td>
                                                <td>{{ $movement->movementDetail->name }}</td>
                                                <td>{{ $movement->code }}</td>
                                                <td>{{ $movement->order }}</td>
                                                <td>{{ $movement->batch }}</td>
                                                <td>{{ $movement->businessName }}</td>
                                                <td>{{ $movement->location->name }}</td>
                                                <td>{{ $movement->origin->name }}</td>
                                                <td>{{ optional($movement->FinishedProduct)->name }}</td>
                                                <td>{{ $movement->amount }}</td>
                                                <td>{{ optional($movement->Destination)->name }}</td>
                                                <td>{{ $movement->observation }}</td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form action="{{ route('movements.destroy', $movement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('movements.show', $movement->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('movements.edit', $movement->id) }}">
                                                                    <i class="bi bi-pencil-fill"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if (auth()->user()->role === '2')
                                                            <form action="{{ route('movements.destroy', $movement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('movements.show', $movement->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if (auth()->user()->role === '7')
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
                {!! $movements->links() !!}
            </div>
        </div>
    </div>
@endsection
