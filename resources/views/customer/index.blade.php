@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Clintes') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('customer.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    <i class="bi bi-plus-circle"></i>
                                </a>
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
                            <table class="table table-striped table-hover">
                                <thead class="thead text-center">
                                    <tr>


                                        <th>Nombre</th>
                                        <th>Ci/Rif</th>
                                        <th>Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                        <tr class="text-center">

                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->Ci }}</td>
                                            <td>{{ $customer->location }}</td>

                                            <td>
                                                @auth
                                                    @if (auth()->user()->role === '1')
                                                        <form action="{{ route('customer.destroy', $customer->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('customer.show', $customer->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('customer.edit', $customer->id) }}">
                                                                <i class="bi bi-pencil-fill"></i>
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    @if (auth()->user()->role === '2')
                                                        <form action="{{ route('customer.destroy', $customer->id) }}"
                                                            method="POST">
                                                            <a class="btn btn-sm btn-primary "
                                                                href="{{ route('customer.show', $customer->id) }}">
                                                                <i class="bi bi-eye-fill"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-success"
                                                                href="{{ route('customer.edit', $customer->id) }}">
                                                                <i class="bi bi-pencil-fill"></i>
                                                            </a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="bi bi-trash-fill"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                    @if (auth()->user()->role === '7')
                                                    @endif

                                                @endauth

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $customers->links() !!}
            </div>
        </div>
    </div>
@endsection
