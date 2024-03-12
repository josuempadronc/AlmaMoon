@extends('layouts.app')

@section('template_title')
    Assembly Movement
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Assembly Movement') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('assembly-movements.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Finishedproduct Id</th>
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
                                    @foreach ($assemblyMovements as $assemblyMovement)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $assemblyMovement->date }}</td>
											<td>{{ $assemblyMovement->typeMovement_id }}</td>
											<td>{{ $assemblyMovement->order }}</td>
											<td>{{ $assemblyMovement->note }}</td>
											<td>{{ $assemblyMovement->finishedProduct_id }}</td>
											<td>{{ $assemblyMovement->amount }}</td>
											<td>{{ $assemblyMovement->color_id }}</td>
											<td>{{ $assemblyMovement->origin_id }}</td>
											<td>{{ $assemblyMovement->movementDeatil_id }}</td>
											<td>{{ $assemblyMovement->location_id }}</td>
											<td>{{ $assemblyMovement->observation }}</td>

                                            <td>
                                                <form action="{{ route('assembly-movements.destroy',$assemblyMovement->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('assembly-movements.show',$assemblyMovement->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('assembly-movements.edit',$assemblyMovement->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $assemblyMovements->links() !!}
            </div>
        </div>
    </div>
@endsection
