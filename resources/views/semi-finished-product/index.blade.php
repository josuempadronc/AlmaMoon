@extends('layouts.app')

@section('template_title')
    Productos Semiterminados
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
                                Productos Semiterminados
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ModalImport">
                                            <i class="bi bi-file-earmark-arrow-up"></i>
                                        </button>
                                        <a href="{{ route('semi-finished-products.create') }}" class="btn btn-primary btn-sm float-right"
                                        data-placement="left">
                                        <i class="bi bi-plus-circle"></i>
                                    </a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style=" height: 600px !important; overflow: auto;">
                        <div class="table-responsive">
                            @if (count($semiFinishedProducts) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead">
                                        <tr>
                                            <th>No</th>
                                            <th>Nombre</th>
                                            <th>Color</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($semiFinishedProducts as $semiFinishedProduct)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $semiFinishedProduct->name }}</td>
                                                <td>{{ $semiFinishedProduct->color->name }}</td>
                                                <td>{{ $semiFinishedProduct->stock }}</td>
                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="action="{{ route('semi-finished-products.destroy', $semiFinishedProduct->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('semi-finished-products.show', $semiFinishedProduct->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('semi-finished-products.edit', $semiFinishedProduct->id) }}">
                                                                    <i class="bi bi-pencil-fill"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm ">
                                                                    <i class="bi bi-trash-fill"></i>
                                                                </button>
                                                            </form>
                                                        @endif
                                                        @if (auth()->user()->role === '2')
                                                            <form
                                                                action="action="{{ route('semi-finished-products.destroy', $semiFinishedProduct->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('semi-finished-products.show', $semiFinishedProduct->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm ">
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
                {{-- {!! $semiFinishedProducts->links() !!} --}}
            </div>
        </div>
    </div>

     <!-- Modal -->
     <div class="modal fade" id="ModalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Importar Producto SemiTerminado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('semi-finished-products.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="SemiTerminado" accept=".txt">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
