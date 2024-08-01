@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                               Consuno de Producto Semi=Terminado
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('inyecion-consumption-semi-finisheds.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '4')
                                        <a href="{{ route('inyecion-consumption-semi-finisheds.create') }}"
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
                            @if (count($inyecionConsumptionSemiFinisheds) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Fecha</th>
										<th>Tipo</th>
										<th>Producto</th>
										<th>Color</th>
										<th>Cantidad</th>
										<th>Producto Entregado</th>
										<th>Patas</th>
										<th>Destino</th>
										<th>Cantidad de Patas</th>
										<th>Tipo de Producto</th>
										<th>Ubicacion</th>
										<th>Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inyecionConsumptionSemiFinisheds as $inyecionConsumptionSemiFinished)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $inyecionConsumptionSemiFinished->date }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->typeMovement->name }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->finishedProduct->name }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->colors->name }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->amount }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->productDelivered }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->paw->name }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->destination->name }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->amountPaw }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->typeProduct }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->location->name }}</td>
											<td>{{ $inyecionConsumptionSemiFinished->observation }}</td>
                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form
                                                            action="{{ route('inyecion-consumption-semi-finisheds.destroy', $inyecionRequest->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('inyecion-consumption-semi-finisheds.show', $inyecionRequest->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('inyecion-consumption-semi-finisheds.edit', $inyecionRequest->id) }}">
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
                                                            action="{{ route('inyecion-consumption-semi-finisheds.destroy', $inyecionRequest->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('inyecion-consumption-semi-finisheds.show', $inyecionRequest->id) }}">
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
