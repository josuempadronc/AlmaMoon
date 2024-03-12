@extends('layouts.app')

@section('template_title')
    Product Type Assembly
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Product Type Assembly') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('product-type-assemblies.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productTypeAssemblies as $productTypeAssembly)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $productTypeAssembly->name }}</td>

                                            <td>
                                                <form action="{{ route('product-type-assemblies.destroy',$productTypeAssembly->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('product-type-assemblies.show',$productTypeAssembly->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('product-type-assemblies.edit',$productTypeAssembly->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productTypeAssemblies->links() !!}
            </div>
        </div>
    </div>
@endsection
