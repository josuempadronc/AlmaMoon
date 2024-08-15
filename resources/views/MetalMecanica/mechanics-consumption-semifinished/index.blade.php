@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Consumo Semi Terminado
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('mechanicsconsumptionsemifinisheds.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '6')
                                        <a href="{{ route('mechanicsconsumptionsemifinisheds.create') }}"
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
                            @if (count($mechanicsConsumptionSemifinisheds) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Semi Terminaso</th>
                                            <th>Cantidad</th>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($mechanicsConsumptionSemifinisheds as $mechanicsConsumptionSemifinished)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $mechanicsConsumptionSemifinished->date }}</td>
                                                <td>{{ $mechanicsConsumptionSemifinished->typeMovement->name }}</td>
                                                <td>{{ $mechanicsConsumptionSemifinished->semiFinished->name }}</td>
                                                <td>{{ $mechanicsConsumptionSemifinished->amountRoll }}</td>
                                                <td>{{ $mechanicsConsumptionSemifinished->product->name }}</td>
                                                <td>{{ $mechanicsConsumptionSemifinished->amountProduct }}</td>
                                                <td>{{ $mechanicsConsumptionSemifinished->observation }}</td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('mechanicsconsumptionsemifinisheds.destroy', $mechanicsConsumptionSemifinished->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('mechanicsconsumptionsemifinisheds.show', $mechanicsConsumptionSemifinished->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('mechanicsconsumptionsemifinisheds.edit', $mechanicsConsumptionSemifinished->id) }}">
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
                                                                action="{{ route('mechanicsconsumptionsemifinisheds.destroy', $mechanicsConsumptionSemifinished->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('mechanicsconsumptionsemifinisheds.show', $mechanicsConsumptionSemifinished->id) }}">
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
