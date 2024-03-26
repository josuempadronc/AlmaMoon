@extends('layouts.app')

@section('template_title')
    Assembly Structure
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Estructura Metalica') }}
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('assembly-structures.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('assembly-structures.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
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
                            @if (count($assemblyStructures) !== 0)
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Insumo</th>
										<th>Color</th>
										<th>Acesorio</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assemblyStructures as $assemblyStructure)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $assemblyStructure->input->name }}</td>
											<td>{{ $assemblyStructure->input->color }}</td>
											<td>{{ $assemblyStructure->accessory->name }}</td>
											<td>{{ $assemblyStructure->amount }}</td>

                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form
                                                            action="{{ route('assembly-structures.destroy', $assemblyStructure->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('assembly-structures.show', $assemblyStructure->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('assembly-structures.edit', $assemblyStructure->id) }}">
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
                                                            action="{{ route('assembly-structures.destroy', $assemblyStructure->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('assembly-structures.show', $assemblyStructure->id) }}">
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
                {!! $assemblyStructures->links() !!}
            </div>
        </div>
    </div>
@endsection
