@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Consumo de Materia Prima
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('sewing-consumptions.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '4')
                                        <a href="{{ route('sewing-consumptions.create') }}"
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
                            @if (count($sewingConsumptions) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Materia Prima</th>
                                        <th>Cantidad por Rollo</th>
                                        <th>Cantidad por Mts</th>
                                        <th>Producto</th>
                                        <th>Cantidad de Producto</th>
                                        <th>Color</th>
                                        <th>Tipo de Producto</th>
                                        <th>Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sewingConsumptions as $sewingConsumption)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $sewingConsumption->date }}</td>
                                            <td>{{ $sewingConsumption->typeMovement->name }}</td>
                                            <td>{{ $sewingConsumption->rawMaterial->name }}</td>
                                            <td>{{ $sewingConsumption->amount }}</td>
                                            <td>{{ $sewingConsumption->Product }}</td>
                                            <td>{{ $sewingConsumption->amountPro }}</td>
                                            <td>{{ $sewingConsumption->color->name }}</td>
                                            <td>{{ $sewingConsumption->TypeProduct }}</td>
                                            <td>{{ $sewingConsumption->observation }}</td>
                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form
                                                            action="{{ route('sewing-consumptions.destroy', $sewingConsumption->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('sewing-consumptions.show', $sewingConsumption->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('sewing-consumptions.edit', $sewingConsumption->id) }}">
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
                                                            action="{{ route('sewing-consumptions.destroy', $sewingConsumption->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('sewing-consumptions.show', $sewingConsumption->id) }}">
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
                {{-- {!! $sewingConsumptions->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
