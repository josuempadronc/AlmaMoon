@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Movimientos
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('mechanics-movements.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '6')
                                        <a href="{{ route('mechanics-movements.create') }}"
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
                            @if (count($mechanicsMovements) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Nota</th>
                                            <th>Orden</th>
                                            <th>Proveedor</th>
                                            <th>Producto O Materia Prima</th>
                                            <th>Cantidad Und</th>
                                            <th>Cantidad Mts</th>
                                            <th>Cantidad Kg</th>
                                            <th>Origen o Destino</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mechanicsMovements as $mechanicsMovement)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $mechanicsMovement->date }}</td>
                                                <td>{{ $mechanicsMovement->typeMovement->name }}</td>
                                                <td>{{ $mechanicsMovement->note }}</td>
                                                <td>{{ $mechanicsMovement->order }}</td>
                                                <td>{{ $mechanicsMovement->supplier->name }}</td>
                                                <td>{{ $mechanicsMovement->Product->name }}</td>
                                                <td>{{ $mechanicsMovement->amountUnd }}</td>
                                                <td>{{ $mechanicsMovement->amountMts }}</td>
                                                <td>{{ $mechanicsMovement->amountKg }}</td>
                                                <td>{{ $mechanicsMovement->origin->name }}</td>
                                                <td>{{ $mechanicsMovement->observation }}</td>

                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('mechanics-movements.destroy', $mechanicsMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('mechanics-movements.show', $mechanicsMovement->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('mechanics-movements.edit', $mechanicsMovement->id) }}">
                                                                    <i class="bi bi-pencil-fill"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if (auth()->user()->role === '6')
                                                            <form
                                                                action="{{ route('mechanics-movements.destroy', $mechanicsMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('mechanics-movements.show', $mechanicsMovement->id) }}">
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
            </div>
        </div>
    </div>
@endsection
