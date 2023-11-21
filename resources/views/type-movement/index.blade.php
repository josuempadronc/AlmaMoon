@extends('layouts.app')

@section('template_title')
    Tipos de Moviminetos
@endsection

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success position-fixed h-20 w-25 top-10 z-1" style="left: 46%;">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                Tipo de Movimineto
                            </span>

                            <div class="float-right">
                                <a href="{{ route('type-movements.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style=" height: 600px !important; overflow: auto;">
                        <div class="table-responsive">
                            @if (count($typeMovements) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>

                                            <th>Nombre</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($typeMovements as $typeMovement)
                                            <tr>
                                                <td>{{ ++$i }}</td>

                                                <td>{{ $typeMovement->name }}</td>

                                                <td>
                                                    <form action="{{ route('type-movements.destroy', $typeMovement->id) }}"
                                                        method="POST">
                                                        <a class="btn btn-sm btn-primary "
                                                            href="{{ route('type-movements.show', $typeMovement->id) }}">
                                                            <i class="bi bi-eye-fill"></i>
                                                        </a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('type-movements.edit', $typeMovement->id) }}">
                                                            <i class="bi bi-pencil-fill"></i>
                                                        </a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-trash-fill"></i>
                                                        </button>
                                                    </form>
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
                {!! $typeMovements->links() !!}
            </div>
        </div>
    </div>
@endsection
