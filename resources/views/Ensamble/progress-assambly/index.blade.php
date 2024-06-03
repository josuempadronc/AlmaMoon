@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Ensamble') }}
                            </span>
                            <div class="float-right">
                                @auth
                                    @if (auth()->user()->role === '1')
                                        <a href="{{ route('progress-assambly.create') }}"
                                            class="btn btn-primary btn-sm float-right" data-placement="left">
                                            <i class="bi bi-plus-circle"></i>
                                        </a>
                                    @endif
                                    @if (auth()->user()->role === '3')
                                        <a href="{{ route('progress-assambly.create') }}"
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
                            @if (count($progressAssamblies) !== 0)
                                <table class="table table-striped table-hover">
                                    <thead class="thead text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Fecha</th>
                                            <th>Producto</th>
                                            <th>Status</th>
                                            <th>Nota</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($progressAssamblies as $progressAssambly)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $progressAssambly->fecha }}</td>
                                                <td>{{ $progressAssambly->Producto}}</td>
                                                {{-- <td>{{ $progressAssambly->cantidad }}</td> --}}
                                                <td>{{ $progressAssambly->status }}</td>
                                                {{-- <td>{{ $progressAssambly->encargado }}</td> --}}
                                                <td>{{ $progressAssambly->nota }}</td>

                                                <td>
                                                    @auth
                                                        @if (auth()->user()->role === '1')
                                                            <form
                                                                action="{{ route('progress-assambly.destroy',$progressAssambly->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('progress-assambly.show',$progressAssambly->id) }}">
                                                                    <i class="bi bi-eye-fill"></i>
                                                                </a>
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{route('progress-assambly.edit',$progressAssambly->id) }}">
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
                                                                action="{{ route('progress-assambly.destroy',$progressAssambly->id) }}"
                                                                method="POST">
                                                                <a class="btn btn-sm btn-primary "
                                                                    href="{{ route('progress-assambly.show', $progressAssambly->id) }}">
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
