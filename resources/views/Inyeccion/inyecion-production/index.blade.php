@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Producto Inyectado
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('inyecion-productions.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('inyecion-productions.create') }}"
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
                            @if (count($inyecionProductions) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Fecha</th>
										<th>Producto</th>
										<th>Color</th>
										<th>Pata</th>
										<th>Cantidad</th>
										<th>Maquina</th>
										<th>Destino</th>
										<th>Ubicacion</th>
										<th>Observacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inyecionProductions as $inyecionProduction)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $inyecionProduction->date }}</td>
											<td>{{ $inyecionProduction->finishedProduct->name }}</td>
											<td>{{ $inyecionProduction->color->name }}</td>
											<td>{{ $inyecionProduction->paw->name }}</td>
											<td>{{ $inyecionProduction->amount }}</td>
											<td>{{ $inyecionProduction->Maquina }}</td>
											<td>{{ $inyecionProduction->destination->name }}</td>
											<td>{{ $inyecionProduction->location->name }}</td>
											<td>{{ $inyecionProduction->observation }}</td>
                                            @auth
                                            @if (auth()->user()->role === '1')
                                                <form
                                                    action="{{ route('inyecion-productions.destroy', $inyecionProduction->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('inyecion-productions.show', $inyecionProduction->id) }}">
                                                        <i class="bi bi-eye-fill"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('inyecion-productions.edit', $inyecionProduction->id) }}">
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
                                                    action="{{ route('inyecion-productions.destroy', $inyecionProduction->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('inyecion-productions.show', $inyecionProduction->id) }}">
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
