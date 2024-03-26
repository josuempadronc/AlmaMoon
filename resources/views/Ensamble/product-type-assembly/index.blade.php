@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Tipo de Producto') }}
                            </span>

                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#ModalImport">
                                            <i class="bi bi-file-earmark-arrow-up"></i>
                                        </button>
                                        <a href="{{ route('product-type-assemblies.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('product-type-assemblies.create') }}"
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

                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($productTypeAssemblies) !== 0)
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nombre</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productTypeAssemblies as $productTypeAssembly)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $productTypeAssembly->name }}</td>

                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form
                                                            action="{{ route('product-type-assemblies.destroy', $productTypeAssembly->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('product-type-assemblies.show', $productTypeAssembly->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('product-type-assemblies.edit', $productTypeAssembly->id) }}">
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
                                                            action="{{ route('product-type-assemblies.show', $productTypeAssembly->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('product-type-assemblies.show', $productTypeAssembly->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    @if (auth()->user()->role === '7')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-x-octagon"></i>
                                                        </button>
                                                    @endif
                                                    @if (auth()->user()->role === '8')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="bi bi-x-octagon"></i>
                                                        </button>
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
                {{-- {!! $productTypeAssemblies->links() !!} --}}
            </div>
        </div>
    </div>
     <!-- Modal -->
     <div class="modal fade" id="ModalImport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Importar Tipos de Producto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('ProductTypeAssembly.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="TipoProductos" accept=".txt">
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Subir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
