@extends('layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header">
						<div style="display: flex; justify-content: space-between; align-items: center;">

							<span id="card_title">
								{{ __('Ficha Producto') }}
							</span>
							<div class="float-right">
								@auth
									@if (auth()->user()->role === '1')
										<a href="{{ route('product-sheats.create') }}" class="btn btn-primary btn-sm float-right"
											data-placement="left">
											<i class="bi bi-plus-circle"></i>
										</a>
									@endif
									@if (auth()->user()->role === '3')
										<a href="{{ route('product-sheats.create') }}"
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
							@if (count($productSheats) !== 0)
								<table class="table table-striped table-hover">
									<thead class="thead">
										<tr>
											{{-- <th>No</th> --}}

											<th>Nombre</th>
											<th>Color</th>
											<th>Insumo</th>
											<th>Cantidad</th>

											<th></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($productSheats as $productSheat)
											<tr>
												{{-- <td>{{ ++$i }}</td> --}}

												<td>{{ $productSheat->name }}</td>
												<td>{{ $productSheat->color->name }}</td>
												<td>
													@foreach ($productSheat->assemblyInputs as $productComponent)
														<ul>
															{{ $productComponent->pivot->assembly_input_id }}
														</ul>
													@endforeach
												</td>
												<td>
													@foreach ($productSheat->assemblyInputs as $productComponent)
														<ul>
															{{ $productComponent->pivot->amount }}
														</ul>
													@endforeach
												</td>
												<td>
													@auth
														@if (auth()->user()->role === '1')
															<form
																action="{{ route('product-sheats.destroy', $productSheat->id) }}"
																method="POST">
																<div class="d-flex">
																	<div>
																		<a class="btn btn-sm btn-primary m-2"
																			href="{{ route('product-sheats.show', $productSheat->id) }}">
																			<i class="bi bi-eye-fill"></i>
																		</a>
																		<a class="btn btn-sm btn-success"
																			href="{{ route('product-sheats.edit', $productSheat->id) }}">
																			<i class="bi bi-pencil-fill"></i>
																		</a>
																	</div>
																</div>
																<a type="button" class="btn btn-sm btn-warning m-2"
																	data-bs-toggle="modal" data-bs-target="#exampleModal">
																	<i class="bi bi-calculator-fill"></i>
																</a>
																	{{-- <button type="button" class="btn btn-primary" id="openModal">Mostrar resultados</button> --}}
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm">
																	<i class="bi bi-trash-fill"></i>
																</button>
															</form>
														@endif
														@if (auth()->user()->role === '3')
															<form
																action="{{ route('product-sheats.destroy', $productSheat->id) }}"
																method="POST">
																<div class="d-flex">
																	<a class="btn btn-sm btn-primary "
																	href="{{ route('product-sheats.show', $productSheat->id) }}">
																	<i class="bi bi-eye-fill"></i>
                                                                    </a>
                                                                    {{-- <a type="button" class="btn btn-sm btn-warning m-2"
                                                                        href="{{ route('product-sheats.edit', $productSheat->id) }}"
                                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                        <i class="bi bi-calculator-fill"></i>
                                                                    </a> --}}
																</div>
																<a type="button" class="btn btn-sm btn-warning m-2"
																	data-bs-toggle="modal" data-bs-target="#exampleModal">
																	<i class="bi bi-calculator-fill"></i>
																</a>
																@csrf
																@method('DELETE')
																{{-- <button type="submit" class="btn btn-danger btn-sm">
																	<i class="bi bi-trash-fill"></i>
																</button> --}}
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
	@if (count($productSheats) !== 0)
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
                   <h1 class="modal-title fs-5 col" id="exampleModalLabel">Ingresa la Cantidad</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="calcular" method="POST" action="{{ route('product-sheats.calculator', $productSheat->id) }}"
					role="form" enctype="multipart/form-data">
					@csrf
					<div class="modal-body">
						<input class="p-1 mx-5 w-75" type="number" id="cantidad_total" name="cantidad_total">
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary">Calcular</button>
					</div>
				</form>
			</div>
		</div>
			</div>

	@endif

		<div class="modal" id="resultadoModal" tabindex="-1" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
                        <div class="d-flex flex-column align-items-center"
                            style="position: relative; left: 24%;">
                            <img src="./images/logo.png">
                            <h5 class="modal-title">{{$productSheat->name}}</h5>
                        </div>


                        <button
                            type="button"
                            id="closeModalButton"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                            style="position: relative; top:-60px;"
                            >
                            <span aria-hidden="true">&times;</span>
                        </button>

					</div>
					<div class="modal-body">
						<!-- Aquí se mostrarán los resultados -->
						<div id="resultadoContent"></div>
					</div>
					<div class="modal-footer">
						<a class="btn btn-sm btn-secondary m-2"
							href="{{ route('product-sheats.pdf', $productSheat->id) }}">
							<i class="bi bi-file-pdf-fill"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
		<!-- Script para mostrar la modal -->
		<script>

			document.getElementById('closeModalButton').addEventListener('click', function() {
				var modal = document.getElementById('resultadoModal');
				modal.style.display = 'none';
			});
			document.getElementById('calcular').addEventListener('submit', function(event) {
				event.preventDefault(); // Evitar el envío del formulario

				// Realizar una petición AJAX al servidor para obtener los valores
				var amountTotal = document.getElementById('cantidad_total').value;

				fetch('{{ route('product-sheats.json', $productSheat->id) }}?cantidad_total=' + amountTotal)
					.then(response => response.json())
					.then(data => {
						// Obtén el contenedor resultadoContent
						var resultadoContent = document.getElementById('resultadoContent');

						// Limpia el contenido existente en resultadoContent
						resultadoContent.innerHTML = '';

						// Agregar las partes y las cantidades
						data.totals.forEach(function(parte) {
							var p = document.createElement('p');
							p.textContent = parte.input + ': ' + parte.value;
							resultadoContent.appendChild(p);
						});

						console.log('funciona');
						console.log(data);

						// Abrir la modal
						var modal = document.getElementById('resultadoModal');
						modal.style.display = 'block';
					})
					.catch(error => {
						// Manejar cualquier error aquí
						console.error(error);
					});
					});
					// document.getElementById('generarPDF').addEventListener('click', function() {
					// var datos = {
					// dato1: 'input',
					// dato2: 'value',
					// // Otros datos necesarios para el PDF
					// };

					// // Almacenar los datos en la sesión
					// sessionStorage.setItem('resultados', JSON.stringify(datos));
					// window.location.href = 'product-sheats/{id}/pdf';
					// });
	</script>
@endsection
