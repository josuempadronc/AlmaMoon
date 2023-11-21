@extends('layouts.app')

@section('template_title')
    Productos SemiTerminados
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
                                {{ __('Productos SemiTerminados') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('semi-finished-movements.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style=" height: 600px !important; overflow: auto;">
                        <div class="table-responsive">
                            @if (count($semiFinishedMovements) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo de Movimiento</th>
                                            <th>Codigo</th>
                                            <th>Numero de Orden</th>
                                            <th>Lote</th>
                                            <th>Proveedor</th>
                                            <th>Producto SemiTerminado</th>
                                            <th>Cantidad</th>
                                            <th>Unidades de Medidas</th>
                                            <th>Origen</th>
                                            <th>Destino</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($semiFinishedMovements as $semiFinishedMovement)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $semiFinishedMovement->date }}</td>
                                                <td>{{ $semiFinishedMovement->typeMovement_id }}</td>
                                                <td>{{ $semiFinishedMovement->code }}</td>
                                                <td>{{ $semiFinishedMovement->order }}</td>
                                                <td>{{ $semiFinishedMovement->batch }}</td>
                                                <td>{{ $semiFinishedMovement->supplier_id }}</td>
                                                <td>{{ $semiFinishedMovement->SemifinishedProduct_id }}</td>
                                                <td>{{ $semiFinishedMovement->amount }}</td>
                                                <td>{{ $semiFinishedMovement->measures_id }}</td>
                                                <td>{{ $semiFinishedMovement->origin_id }}</td>
                                                <td>{{ $semiFinishedMovement->destination_id }}</td>

                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('semi-finished-movements.destroy', $semiFinishedMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('semi-finished-movements.show', $semiFinishedMovement->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('semi-finished-movements.edit', $semiFinishedMovement->id) }}">
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
                                                            <form
                                                                action="{{ route('semi-finished-movements.destroy', $semiFinishedMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('semi-finished-movements.show', $semiFinishedMovement->id) }}">
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
                {!! $semiFinishedMovements->links() !!}
            </div>
        </div>
    </div>
@endsection
