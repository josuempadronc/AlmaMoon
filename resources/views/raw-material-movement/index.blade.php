@extends('layouts.app')

@section('template_title')
    Moviminetos Materia Prima
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
                                Moviminetos Materia Prima
                            </span>

                            <div class="float-right">
                                <a href="{{ route('raw-material-movements.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style=" height: 600px !important; overflow: auto;">
                        <div class="table-responsive">
                            @if (count($rawMaterialMovements) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Orden</th>
                                            <th>Consumo</th>
                                            <th>Cliente</th>
                                            <th>Proveedor</th>
                                            <th>Material</th>
                                            <th>Cantidad</th>
                                            <th>Origen</th>
                                            <th>Destino</th>
                                            <th>Ubicacion</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rawMaterialMovements as $rawMaterialMovement)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $rawMaterialMovement->date }}</td>
                                                <td>{{ $rawMaterialMovement->typeMovement_id }}</td>
                                                <td>{{ $rawMaterialMovement->order }}</td>
                                                <td>{{ $rawMaterialMovement->consumption }}</td>
                                                <td>{{ $rawMaterialMovement->businessName }}</td>
                                                <td>{{ $rawMaterialMovement->supplier_id }}</td>
                                                <td>{{ $rawMaterialMovement->rawMaterial }}</td>
                                                <td>{{ $rawMaterialMovement->amount }}</td>
                                                <td>{{ $rawMaterialMovement->origin_id }}</td>
                                                <td>{{ $rawMaterialMovement->destination_id }}</td>
                                                <td>{{ $rawMaterialMovement->location_id }}</td>
                                                <td>{{ $rawMaterialMovement->observation }}</td>

                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('raw-material-movements.destroy', $rawMaterialMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('raw-material-movements.show', $rawMaterialMovement->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('raw-material-movements.edit', $rawMaterialMovement->id) }}">
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
                                                                action="{{ route('raw-material-movements.destroy', $rawMaterialMovement->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('raw-material-movements.show', $rawMaterialMovement->id) }}">
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
                {{-- {!! $rawMaterialMovements->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
