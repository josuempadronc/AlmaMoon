@extends('layouts.app')

@section('template_title')
    Progress Vulcanizado
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Vulcanizado') }}
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('progress-vulcanizado.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('progress-vulcanizado.create') }}"
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
                            @if (count($progressVulcanizados) !== 0)
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

										<th>Producto</th>
										<th>Cantidad</th>
										<th>Status</th>
										<th>Encargado</th>
										<th>Nota</th>
										<th>Fecha</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($progressVulcanizados as $progressVulcanizado)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $progressVulcanizado->finishedProduct_id }}</td>
											<td>{{ $progressVulcanizado->cantidad }}</td>
											<td>{{ $progressVulcanizado->status }}</td>
											<td>{{ $progressVulcanizado->encargado }}</td>
											<td>{{ $progressVulcanizado->nota }}</td>
											<td>{{ $progressVulcanizado->fecha }}</td>
                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form
                                                            action="{{ route('progress-vulcanizado.destroy',$progressVulcanizado->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('progress-vulcanizado.show',$progressVulcanizado->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{route('progress-vulcanizado.edit',$progressVulcanizado->id) }}">
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
                                                            action="{{ route('progress-vulcanizado.destroy',$progressVulcanizado->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('assembly-vulcanizado.show', $progressVulcanizado->id) }}">
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
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                            <h4 class="text-center">No hay registros</h4>
                         @endif
                        </div>
                    </div>
                </div>
                {{-- {!! $progressVulcanizados->links() !!} --}}
            </div>
        </div>
    </div>
@endsection
