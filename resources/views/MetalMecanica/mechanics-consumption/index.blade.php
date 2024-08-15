@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Consumo Materia Prima
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('mechanics-consumptions.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '6')
                                        <a href="{{ route('mechanics-consumptions.create') }}"
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
                            @if (count($mechanicsConsumptions) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Orden</th>
                                            <th>Materia Prima</th>
                                            <th>Cantidad Mts</th>
                                            <th>Cantidad Kg</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Tipo de Producto</th>
                                            <th>Ubicacion</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mechanicsConsumptions as $mechanicsConsumption)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $mechanicsConsumption->date }}</td>
                                                <td>{{ $mechanicsConsumption->typeMovement->name }}</td>
                                                <td>{{ $mechanicsConsumption->order }}</td>
                                                <td>{{ $mechanicsConsumption->rawMaterial->name }}</td>
                                                <td>{{ $mechanicsConsumption->amountRoll }}</td>
                                                <td>{{ $mechanicsConsumption->amountMts }}</td>
                                                <td>{{ $mechanicsConsumption->Product }}</td>
                                                <td>{{ $mechanicsConsumption->amountProduct }}</td>
                                                <td>{{ $mechanicsConsumption->TypeProduct }}</td>
                                                <td>{{ $mechanicsConsumption->location->name }}</td>
                                                <td>{{ $mechanicsConsumption->observation }}</td>

                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('mechanics-consumptions.destroy', $mechanicsConsumption->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('mechanics-consumptions.show', $mechanicsConsumption->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('mechanics-consumptions.edit', $mechanicsConsumption->id) }}">
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
                                                                action="{{ route('mechanics-consumptions.destroy', $mechanicsConsumption->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('mechanics-consumptions.show', $mechanicsConsumption->id) }}">
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
