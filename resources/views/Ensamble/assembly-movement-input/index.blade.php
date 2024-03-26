@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Movimientos de Insumo') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('assembly-movement-inputs.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
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
                            @if (count($assemblyMovementInputs) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipi de Movimiento</th>
                                            <th>No Orden</th>
                                            <th>No Nota</th>
                                            <th>Insumo</th>
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
                                        @foreach ($assemblyMovementInputs as $assemblyMovementInput)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $assemblyMovementInput->date }}</td>
                                                <td>{{ $assemblyMovementInput->typeMovement_id }}</td>
                                                <td>{{ $assemblyMovementInput->order }}</td>
                                                <td>{{ $assemblyMovementInput->note }}</td>
                                                <td>{{ $assemblyMovementInput->input_id }}</td>
                                                <td>{{ $assemblyMovementInput->amount }}</td>
                                                <td>{{ $assemblyMovementInput->color_id }}</td>
                                                <td>{{ $assemblyMovementInput->origin_id }}</td>
                                                <td>{{ $assemblyMovementInput->movementDeatil_id }}</td>
                                                <td>{{ $assemblyMovementInput->location_id }}</td>
                                                <td>{{ $assemblyMovementInput->observation }}</td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('assembly-movement-inputs.destroy', $assemblyMovementInput->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('assembly-movement-inputs.show', $assemblyMovementInput->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('assembly-movement-inputs.edit', $assemblyMovementInput->id) }}">
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
                                                                action="{{ route('assembly-movement-inputs.destroy', $assemblyMovementInput->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('assembly-movement-inputs.show', $assemblyMovementInput->id) }}">
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
                {{-- {!! $assemblyMovementInputs->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
