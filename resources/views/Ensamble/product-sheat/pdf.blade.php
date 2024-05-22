<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Orden de Insumos</title>
</head>
<style>
	@page {
	margin-left: 10px;
	margin-right: 10px;
	}
		.card-header{
			display: flex;
			flex: 1 1;
			flex-direction: column;
			position: relative;
			width: 100vw;
		}
</style>
<body>
	<section class="">
		<div class="">
			<div class="">
				<div style="
                        border: 2px solid black;
                        border-radius:20px;
                       "
					>
					<div style="
                        margin-top:5%;
                        position: relative;
                        "
					>

						<img
							src="./images/logo.png"
							style="
                                position:relative;
                                margin-left:35%;
                                "
							>
						<h2
							class="card-title"
							style="
                                    position:relative;
                                    margin-left:38%;
                                    margin-top:2%;
                                "
							>
								Orden de Insumos
								</h2>
						<p
							style="
                            position:relative;
                            margin-left:75%;
                            margin-top:3%;
                            "
						>
							Fecha: {{ $dateFormat }}
							</p>

					<div
						class="card-body"
						style="
                            position:relative;
                            margin-left:5%;
                            margin-top:5%;
                            margin-bottom:5%;
                        "
						>
                        <ul> 
						    @foreach ( $datos as $element )

                                <li><h3>{{ $element['input'] }} : {{ $element['value'] }}</h3></li>

						    @endforeach
                        </ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>

</html>
