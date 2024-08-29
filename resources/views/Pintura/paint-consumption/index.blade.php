@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Consumos
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('paint-consumptions.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '4')
                                        <a href="{{ route('paint-consumptions.create') }}"
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
                            @if (count($paintConsumptions) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Orden</th>
                                        <th>Producto Semiterminado O Materia Prima</th>
                                        <th>Cantidad</th>
                                        <th>Unidad de medida</th>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Tipo</th>
                                        <th>Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paintConsumptions as $paintConsumption)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $paintConsumption->date }}</td>
                                            <td>{{ $paintConsumption->typeMovement->name }}</td>
                                            <td>{{ $paintConsumption->order }}</td>
                                            <td>{{ $paintConsumption->ProductOrMaterial }}</td>
                                            <td>{{ $paintConsumption->amount }}</td>
                                            <td>{{ $paintConsumption->measure->name }}</td>
                                            <td>{{ $paintConsumption->Product }}</td>
                                            <td>{{ $paintConsumption->amountProduct }}</td>
                                            <td>{{ $paintConsumption->type }}</td>
                                            <td>{{ $paintConsumption->observation }}</td>

                                            <td>
                                                @auth
                                                @if (auth()->user()->role === '1')
                                                    <form
                                                        action="{{ route('paint-consumptions.destroy', $paintConsumption->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('paint-consumptions.show', $paintConsumption->id) }}">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('paint-consumptions.edit', $paintConsumption->id) }}">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                                @if (auth()->user()->role === '4')
                                                    <form
                                                        action="{{ route('paint-consumptions.destroy', $paintConsumption->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('paint-consumptions.show', $paintConsumption->id) }}">
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
