@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Requerimientos
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('inyecion-requests.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '4')
                                        <a href="{{ route('inyecion-requests.create') }}"
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
                            @if (count($inyecionRequests) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Orden</th>
                                            <th>Producto</th>
                                            <th>Color</th>
                                            <th>Patas</th>
                                            <th>Cantidad</th>
                                            <th>Cantidad terminadas</th>
                                            <th>Cantidad por terminar</th>
                                            <th>Observacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($inyecionRequests as $inyecionRequest)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $inyecionRequest->date }}</td>
                                                <td>{{ $inyecionRequest->typeMovement->name }}</td>
                                                <td>{{ $inyecionRequest->order }}</td>
                                                <td>{{ $inyecionRequest->finishedProduct->name }}</td>
                                                <td>{{ $inyecionRequest->colors->name }}</td>
                                                <td>{{ $inyecionRequest->paw->name }}</td>
                                                <td>{{ $inyecionRequest->amount }}</td>
                                                <td>{{ $inyecionRequest->amountToManofacture }}</td>
                                                <td>{{ $inyecionRequest->amountManofacture }}</td>
                                                <td>{{ $inyecionRequest->observation }}</td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('inyecion-requests.destroy', $inyecionRequest->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('inyecion-requests.show', $inyecionRequest->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('inyecion-requests.edit', $inyecionRequest->id) }}">
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
                                                                action="{{ route('inyecion-requests.destroy', $inyecionRequest->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('inyecion-requests.show', $inyecionRequest->id) }}">
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
