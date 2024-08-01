@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Ordenes de Produccion
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('inyecion-order-p-roductions.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '4')
                                        <a href="{{ route('inyecion-order-p-roductions.create') }}"
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
                            @if (count($inyecionOrderPRoductions) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Fecha</th>
										<th>Orden</th>
										<th>Producto</th>
										<th>Color</th>
										<th>Pata</th>
										<th>Cantidad</th>
										<th>Cantidad Terminada</th>
										<th>Cantidad por Terminar </th>
										<th>Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inyecionOrderPRoductions as $inyecionOrderPRoduction)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $inyecionOrderPRoduction->date }}</td>
											<td>{{ $inyecionOrderPRoduction->order }}</td>
											<td>{{ $inyecionOrderPRoduction->finishedProduct->name }}</td>
											<td>{{ $inyecionOrderPRoduction->colors->name }}</td>
											<td>{{ $inyecionOrderPRoduction->paw->name }}</td>
											<td>{{ $inyecionOrderPRoduction->amount }}</td>
											<td>{{ $inyecionOrderPRoduction->amountToManofacture }}</td>
											<td>{{ $inyecionOrderPRoduction->amountManofacture }}</td>
											<td>{{ $inyecionOrderPRoduction->observation }}</td>
                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form
                                                            action="{{ route('inyecion-order-p-roductions.destroy', $inyecionOrderPRoduction->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('inyecion-order-p-roductions.show', $inyecionOrderPRoduction->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('inyecion-order-p-roductions.edit', $inyecionOrderPRoduction->id) }}">
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
                                                            action="{{ route('inyecion-order-p-roductions.destroy', $inyecionOrderPRoduction->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('inyecion-order-p-roductions.show', $inyecionOrderPRoduction->id) }}">
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
F           </div>
        </div>
    </div>
@endsection
