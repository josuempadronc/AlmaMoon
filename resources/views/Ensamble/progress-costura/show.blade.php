@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
							<span class="card-title">Progreso</span>
							<div class="float-right">
								<div class="float-right">
									<div class="float-right">
										<a class="btn btn-primary" href="{{ route('progress-costura.index') }}">
											<i class="bi bi-backspace"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
                    </div>
                    
                    <div class="card-body">
                        <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">Fecha</label>
                                        <input type="text" class="form-control" value="{{ $progressCostura->fecha }}" disabled readonly>
                                    </div>
                                </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Producto</label>
                                    <input type="text" class="form-control" value="{{ $progressCostura->Producto}}" disabled readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Cantidad</label>
                                    <input type="text" class="form-control" value="{{ $progressCostura->cantidad }}" disabled readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Status</label>
                                    <input type="text" class="form-control" value="{{ $progressCostura->status }}" disabled readonly>
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Encargado</label>
                                    <input type="text" class="form-control" value="{{ $progressCostura->encargado }}" disabled readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Nota</label>
                                    <input type="textarea" class="form-control" value="{{ $progressCostura->nota }}" disabled readonly>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
