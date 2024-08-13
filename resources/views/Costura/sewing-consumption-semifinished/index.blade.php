@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Cosumo de SemiTerminado
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('sewing-consumption-semifinisheds.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '4')
                                        <a href="{{ route('sewing-consumption-semifinisheds.create') }}"
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
                            @if (count($sewingConsumptionSemifinisheds) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>tipo</th>
                                            <th>SemiTerminado</th>
                                            <th>Cantidad</th>
                                            <th>Producto</th>
                                            <th>Cantidad de Producto </th>
                                            <th>Color</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sewingConsumptionSemifinisheds as $sewingConsumptionSemifinished)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $sewingConsumptionSemifinished->date }}</td>
                                                <td>{{ $sewingConsumptionSemifinished->typeMovement->name }}</td>
                                                <td>{{ $sewingConsumptionSemifinished->SemifinishedProduct->name }}</td>
                                                <td>{{ $sewingConsumptionSemifinished->amount }}</td>
                                                <td>{{ $sewingConsumptionSemifinished->Product }}</td>
                                                <td>{{ $sewingConsumptionSemifinished->amountPro }}</td>
                                                <td>{{ $sewingConsumptionSemifinished->color->name }}</td>
                                                <td>{{ $sewingConsumptionSemifinished->observation }}</td>

                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('sewing-consumption-semifinisheds.destroy', $sewingConsumptionSemifinished->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('sewing-consumption-semifinisheds.show', $sewingConsumptionSemifinished->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('sewing-consumption-semifinisheds.edit', $sewingConsumptionSemifinished->id) }}">
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
                                                                action="{{ route('sewing-consumption-semifinisheds.destroy', $sewingConsumptionSemifinished->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('sewing-consumption-semifinisheds.show', $sewingConsumptionSemifinished->id) }}">
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
