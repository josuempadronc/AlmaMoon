@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Movimientos del Producto
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('inyecion-exit-products.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '4')
                                        <a href="{{ route('inyecion-exit-products.create') }}"
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
                            @if (count($inyecionExitProducts) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Orden</th>
                                            <th>Nota</th>
                                            <th>Producto</th>
                                            <th>Color</th>
                                            <th>Patas</th>
                                            <th>Cantidad</th>
                                            <th>Destino</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inyecionExitProducts as $inyecionExitProduct)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $inyecionExitProduct->date }}</td>
                                                <td>{{ $inyecionExitProduct->typeMovement->name }}</td>
                                                <td>{{ $inyecionExitProduct->order }}</td>
                                                <td>{{ $inyecionExitProduct->note }}</td>
                                                <td>{{ $inyecionExitProduct->finishedProduct->name }}</td>
                                                <td>{{ $inyecionExitProduct->colors->name }}</td>
                                                <td>{{ $inyecionExitProduct->paw->name }}</td>
                                                <td>{{ $inyecionExitProduct->amount }}</td>
                                                <td>{{ $inyecionExitProduct->destination->name }}</td>
                                                <td>{{ $inyecionExitProduct->observation }}</td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('inyecion-exit-products.destroy', $inyecionExitProduct->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('inyecion-exit-products.show', $inyecionExitProduct->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('inyecion-exit-products.edit', $inyecionExitProduct->id) }}">
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
                                                                action="{{ route('inyecion-exit-products.destroy', $inyecionExitProduct->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('inyecion-exit-products.show', $inyecionExitProduct->id) }}">
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
