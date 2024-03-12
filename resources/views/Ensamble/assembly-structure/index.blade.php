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
                                {{ __('Assembly Structure') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('assembly-structures.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name Input</th>
										<th>Color Input</th>
										<th>Accessory Id</th>
										<th>Amount</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assemblyStructures as $assemblyStructure)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $assemblyStructure->name_input }}</td>
											<td>{{ $assemblyStructure->color_input }}</td>
											<td>{{ $assemblyStructure->accessory_id }}</td>
											<td>{{ $assemblyStructure->amount }}</td>

                                            <td>
                                                <form action="{{ route('assembly-structures.destroy',$assemblyStructure->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('assembly-structures.show',$assemblyStructure->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('assembly-structures.edit',$assemblyStructure->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $assemblyStructures->links() !!}
            </div>
        </div>
    </div>
@endsection
