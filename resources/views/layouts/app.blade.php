<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">


	<title>{{ config('app.name', 'MonnPlast') }}</title>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- Scripts -->
	@vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/jquery.min.js'])
</head>
@php
	$dashboardAlamacen = auth::user();

@endphp

<body>

	<div class="container-fluid" id="app">
		<div class="row flex-nowrap">
			{{-- SIDEBAR --}}
			@auth
				{{-- Admin --}}
				@if (auth::user()->role === '1')
					<div class="col-auto" style=" height: 100vh !important; background-color: #152193 !important;">
						<div id="sidebar" class="collapse collapse-horizontal show ">
							{{-- LOGO --}}
							<a href="{{ url('home') }}">
								<img src="/images/logoWhite.png" class="w-50 mt-2"
									style="left: 15%; position: relative; width: 125px !important;">
							</a>
							{{-- END LOGO --}}
							{{-- SIDEBAR --}}
							<div id="sidebar-nav"
								class="list-group border-0 rounded-0 text-sm-start text-white max-vh-100 mx-3 mt-2"
								style="width: 180px; ">
								{{-- LINK MENU --}}
								{{-- ACORDEON --}}
								<div class="accordion accordion-flush bg-p" id="accordion_Almacen">
									{{-- Alamacen --}}
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#Almacen" aria-expanded="false"
												aria-controls="Almacen">
												Almacen
											</button>
										</h2>
										<div id="Almacen" class="accordion-collapse collapse"
											data-bs-parent="#accordion_Almacen">
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('finished-products') }}">{{ __('Productos Terminados') }}</a>
											{{-- <a class="nav-link p-2 mb-2" --}}
												{{-- href="{{ URL::to('assembled-products') }}">{{ __('Productos Ensamblados') }}</a> --}}
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('semi-finished-products') }}">{{ __('Productos SemiTerminados') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('raw-materials') }}">{{ __('Materia Prima') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('orders') }}">{{ __('Pedidos') }}</a>
											<p>Moviminetos</p>
											<a class="nav-link p-2 mb-2 mt-2"
												href="{{ URL::to('semi-finished-movements') }}">{{ __('Productos SemiTerminados') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('movements') }}">{{ __('Productos Terminados') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('raw-material-movements') }}">{{ __('Materia Prima') }}</a>
										</div>
									</div>
									{{-- Ensamble --}}
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#Ensamble" aria-expanded="false"
												aria-controls="Ensamble">
												Ensamble
											</button>
										</h2>
										<div id="Ensamble" class="accordion-collapse collapse"
											data-bs-parent="#accordion_Ensamble">
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-inputs') }}">{{ __('Insumo') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('product-sheats') }}">{{ __('Ficha Producto') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('orders') }}">{{ __('Pedidos') }}</a>
											<p>Moviminetos</p>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-movements') }}">{{ __('Producto Terminado') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-movement-inputs') }}">{{ __('Insumo') }}</a>
                                            <div class="accordion-item">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed" type="button"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
                                                        aria-expanded="false" aria-controls="flush-collapseTwo">
                                                        Progreso de Produccion
                                                    </button>
                                                </h2>
                                                <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                    data-bs-parent="#accordionFlushExample">
                                                    <a class="nav-link p-2 mb-2 mt-2"
                                                        href="{{ URL::to('progress-assambly') }}">{{ __('Ensamble') }}</a>
                                                    <a class="nav-link p-2 mb-2"
                                                        href="{{ URL::to('progress-lona') }}">{{ __('Lona') }}</a>
                                                    <a class="nav-link p-2 mb-2"
                                                        href="{{ URL::to('progress-serigrafium') }}">{{ __('Serigrafia') }}</a>
                                                    <a class="nav-link p-2 mb-2"
                                                        href="{{ URL::to('progress-vulcanizado') }}">{{ __('Tapizado') }}</a>
                                                    <a class="nav-link p-2 mb-2"
                                                        href="{{ URL::to('progress-costura') }}">{{ __('Costura') }}</a>
                                                </div>
                                            </div>
										</div>
									</div>

									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
												aria-expanded="false" aria-controls="flush-collapseTwo">
												Configuracion
											</button>
										</h2>
										<div id="flush-collapseTwo" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2 mt-2"
												href="{{ URL::to('color') }}">{{ __('Colores') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('destinations') }}">{{ __('Destinos') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('locations') }}">{{ __('Ubicaciones') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('measures') }}">{{ __('Unidades de Medidas') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('movement-details') }}">{{ __('Detalles de Movimientos') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('origins') }}">{{ __('Origen') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('paws') }}">{{ __('Patas') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('suppliers') }}">{{ __('Proveedores') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('type-movements') }}">{{ __('Tipos de Movimientos') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('customer') }}">{{ __('Clientes') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-structures') }}">{{ __('Estructuras Metalicas') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-accessories') }}">{{ __('Accesorio') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('product-type-assemblies') }}">{{ __('Tipo de Producto') }}</a>
										</div>
									</div>
									<div class="accordion-item"
										style="position: relative; display: block; margin-top: 8%;">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
												aria-expanded="false" aria-controls="flush-coll(apseThree">
												{{ Auth::user()->name ?? 'login' }}
											</button>
										</h2>
										<div id="flush-collapseThree" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2 mt-2" href="{{ route('logout') }}"
												onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
												<i class="bi bi-box-arrow-left mx-2"></i>
												{{ __('Logout') }}

											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST"
												class="d-none">
												@csrf
											</form>
										</div>
									</div>
								</div>
								{{-- END ACORDEON --}}
								{{-- END LINK MENU --}}
							</div>
							{{-- END SIDEBAR --}}
						</div>
					</div>
				@endif
				{{-- Almacen --}}
				@if (auth::user()->role === '2')
					<div class="col-auto" style=" height: 100vh !important; background-color: #152193 !important;">
						<div id="sidebar" class="collapse collapse-horizontal show ">
							{{-- LOGO --}}
							<a href="{{ url('almacen') }}">
								<img src="/images/logoWhite.png" class="w-50 mt-2"
									style="left: 15%; position: relative; width: 125px !important;">
							</a>
							{{-- END LOGO --}}
							{{-- SIDEBAR --}}

							<div id="sidebar-nav"
								class="list-group border-0 rounded-0 text-sm-start text-white max-vh-100 mx-3 mt-2"
								style="width: 180px; ">
								{{-- LINK MENU --}}
								<div class="p-2">
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('finished-products') }}">{{ __('Productos Terminados') }}</a>
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('assembled-products') }}">{{ __('Productos Ensamblados') }}</a>
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('semi-finished-products') }}">{{ __('Productos SemiTerminados') }}</a>
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('raw-materials') }}">{{ __('Materia Prima') }}</a>
									<a class="nav-link p-2 mb-2" href="{{ URL::to('orders') }}">{{ __('Pedidos') }}</a>
								</div>
								{{-- END LINK MENU --}}
								{{-- ACORDEON --}}
								<div class="accordion accordion-flush bg-p" id="accordionFlushExample">
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
												aria-expanded="false" aria-controls="flush-collapseOne">
												Moviminetos
											</button>
										</h2>
										<div id="flush-collapseOne" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2 mt-2"
												href="{{ URL::to('semi-finished-movements') }}">{{ __('Productos SemiTerminados') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('movements') }}">{{ __('Productos Terminados') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('raw-material-movements') }}">{{ __('Materia Prima') }}</a>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
												aria-expanded="false" aria-controls="flush-collapseTwo">
												Configuracion
											</button>
										</h2>
										<div id="flush-collapseTwo" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2 mt-2"
												href="{{ URL::to('color') }}">{{ __('Colores') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('destinations') }}">{{ __('Destinos') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('locations') }}">{{ __('Ubicaciones') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('measures') }}">{{ __('Unidades de Medidas') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('movement-details') }}">{{ __('Detalles de Movimientos') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('origins') }}">{{ __('Origen') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('paws') }}">{{ __('Patas') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('suppliers') }}">{{ __('Proveedores') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('type-movements') }}">{{ __('Tipos de Movimientos') }}</a>
										</div>
									</div>
									<div style="">

									</div>
									<div class="accordion-item"
										style="position: relative; display: block; margin-top: 20%;">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
												aria-expanded="false" aria-controls="flush-coll(apseThree">
												{{ Auth::user()->name ?? 'login' }}
											</button>
										</h2>
										<div id="flush-collapseThree" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2 mt-2" href="{{ route('logout') }}"
												onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
												<i class="bi bi-box-arrow-left mx-2"></i>
												{{ __('Logout') }}

											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST"
												class="d-none">
												@csrf
											</form>
										</div>
									</div>
								</div>
								{{-- END ACORDEON --}}
							</div>
							{{-- END SIDEBAR --}}
						</div>
					</div>
				@endif
				{{-- Ensamble --}}
				@if (auth::user()->role === '3')
					<div class="col-auto" style=" height: 100vh !important; background-color: #152193 !important;">
						<div id="sidebar" class="collapse collapse-horizontal show ">
							{{-- LOGO --}}
							<a href="{{ url('ensamble') }}">
								<img src="/images/logoWhite.png" class="w-50 mt-2"
									style="left: 15%; position: relative; width: 125px !important;">
							</a>
							{{-- END LOGO --}}
							{{-- SIDEBAR --}}

							<div id="sidebar-nav"
								class="list-group border-0 rounded-0 text-sm-start text-white max-vh-100 mx-3 mt-2"
								style="width: 180px; ">
								{{-- LINK MENU --}}
								<div class="p-2">
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('assembly-inputs') }}">{{ __('Insumo') }}</a>
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('product-sheats') }}">{{ __('Ficha Producto') }}</a>
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('assembly-structures') }}">{{ __('Estructuras Metalicas') }}</a>
									<a class="nav-link p-2 mb-2"
										href="{{ URL::to('orders') }}">{{ __('Pedidos') }}</a>
								</div>
								{{-- END LINK MENU --}}
								{{-- ACORDEON --}}
								<div class="accordion accordion-flush bg-p" id="accordionFlushExample">
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
												aria-expanded="false" aria-controls="flush-collapseOne">
												Moviminetos
											</button>
										</h2>
										<div id="flush-collapseOne" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-movements') }}">{{ __('Producto Terminado') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-movement-inputs') }}">{{ __('Insumo') }}</a>
										</div>
									</div>
									<div class="accordion-item">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo"
												aria-expanded="false" aria-controls="flush-collapseTwo">
												Configuracion
											</button>
										</h2>
										<div id="flush-collapseTwo" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2 mt-2"
												href="{{ URL::to('color') }}">{{ __('Colores') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('destinations') }}">{{ __('Destinos') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('locations') }}">{{ __('Ubicaciones') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('measures') }}">{{ __('Unidades de Medidas') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('movement-details') }}">{{ __('Detalles de Movimientos') }}</a>
											{{-- <a class="nav-link p-2 mb-2"
												href="{{ URL::to('origins') }}">{{ __('Origen') }}</a> --}}
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('paws') }}">{{ __('Patas') }}</a>
											{{-- <a class="nav-link p-2 mb-2"
												href="{{ URL::to('suppliers') }}">{{ __('Proveedores') }}</a> --}}
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('type-movements') }}">{{ __('Tipos de Movimientos') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('assembly-accessories') }}">{{ __('Accesorio') }}</a>
											<a class="nav-link p-2 mb-2"
												href="{{ URL::to('product-type-assemblies') }}">{{ __('Tipo de Producto') }}</a>
										</div>
									</div>
									<div style="">

									</div>
									<div class="accordion-item"
										style="position: relative; display: block; margin-top: 20%;">
										<h2 class="accordion-header">
											<button class="accordion-button collapsed" type="button"
												data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
												aria-expanded="false" aria-controls="flush-coll(apseThree">
												{{ Auth::user()->name ?? 'login' }}
											</button>
										</h2>
										<div id="flush-collapseThree" class="accordion-collapse collapse"
											data-bs-parent="#accordionFlushExample">
											<a class="nav-link p-2 mb-2 mt-2" href="{{ route('logout') }}"
												onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
												<i class="bi bi-box-arrow-left mx-2"></i>
												{{ __('Logout') }}

											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST"
												class="d-none">
												@csrf
											</form>
										</div>
									</div>
								</div>
								{{-- END ACORDEON --}}
							</div>
							{{-- END SIDEBAR --}}
						</div>
					</div>
				@endif
			@else
				<p>No has iniciado sesión.</p>
			@endauth
			{{-- END SIDEBAR --}}

			{{-- CONTENT --}}
			<main class="col ps-md-2 pt-2">
				<a href="#" data-bs-target="#sidebar" data-bs-toggle="collapse"
					class="border rounded-3 p-1 text-decoration-none"><i class="bi bi-list bi-lg py-2 p-1"></i></a>
				<div class="mt-4">
					@yield('content')
				</div>
			</main>
			{{-- END CONTENT --}}
		</div>
	</div>
</body>

</html>
