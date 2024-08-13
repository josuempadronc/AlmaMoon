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
                                        <a href="{{ route('inyecion-consumption-raws.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('inyecion-consumption-raws.create') }}"
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
                            @if (count($inyecionConsumptionRaws) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Fecha</th>
										<th>Tipo</th>
										<th>Orden</th>
										<th>Orden de Produccion</th>
										<th>Maquina</th>
										<th>Producto</th>
										<th>Materia Prima</th>
										<th>Cantidad</th>
										<th>Destino</th>
										<th>Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inyecionConsumptionRaws as $inyecionConsumptionRaw)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $inyecionConsumptionRaw->date }}</td>
											<td>{{ $inyecionConsumptionRaw->typeMovement_id }}</td>
											<td>{{ $inyecionConsumptionRaw->order }}</td>
											<td>{{ $inyecionConsumptionRaw->orderProduction }}</td>
											<td>{{ $inyecionConsumptionRaw->Maquina }}</td>
											<td>{{ $inyecionConsumptionRaw->finishedProduct_id }}</td>
											<td>{{ $inyecionConsumptionRaw->rawMaterial_id }}</td>
											<td>{{ $inyecionConsumptionRaw->amount }}</td>
											<td>{{ $inyecionConsumptionRaw->destination_id }}</td>
											<td>{{ $inyecionConsumptionRaw->observation }}</td>
                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form
                                                            action="{{ route('inyecion-consumption-raws.destroy', $inyecionRequest->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('inyecion-consumption-raws.show', $inyecionRequest->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('inyecion-consumption-raws.edit', $inyecionRequest->id) }}">
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
                                                            action="{{ route('inyecion-consumption-raws.destroy', $inyecionRequest->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('inyecion-consumption-raws.show', $inyecionRequest->id) }}">
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
