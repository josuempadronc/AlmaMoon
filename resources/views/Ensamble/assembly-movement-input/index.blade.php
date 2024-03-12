@extends('layouts.app')

@section('template_title')
    Assembly Movement Input
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Assembly Movement Input') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('assembly-movement-inputs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Date</th>
										<th>Typemovement Id</th>
										<th>Order</th>
										<th>Note</th>
										<th>Input Id</th>
										<th>Amount</th>
										<th>Color Id</th>
										<th>Origin Id</th>
										<th>Movementdeatil Id</th>
										<th>Location Id</th>
										<th>Observation</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($assemblyMovementInputs as $assemblyMovementInput)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $assemblyMovementInput->date }}</td>
											<td>{{ $assemblyMovementInput->typeMovement_id }}</td>
											<td>{{ $assemblyMovementInput->order }}</td>
											<td>{{ $assemblyMovementInput->note }}</td>
											<td>{{ $assemblyMovementInput->input_id }}</td>
											<td>{{ $assemblyMovementInput->amount }}</td>
											<td>{{ $assemblyMovementInput->color_id }}</td>
											<td>{{ $assemblyMovementInput->origin_id }}</td>
											<td>{{ $assemblyMovementInput->movementDeatil_id }}</td>
											<td>{{ $assemblyMovementInput->location_id }}</td>
											<td>{{ $assemblyMovementInput->observation }}</td>

                                            <td>
                                                <form action="{{ route('assembly-movement-inputs.destroy',$assemblyMovementInput->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('assembly-movement-inputs.show',$assemblyMovementInput->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('assembly-movement-inputs.edit',$assemblyMovementInput->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $assemblyMovementInputs->links() !!}
            </div>
        </div>
    </div>
@endsection
