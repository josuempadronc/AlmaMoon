<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    @page {
		margin-left: 10px;
		margin-right: 10px;
	}
    table {
        width: 770px;
        border-collapse: collapse;
    }
    th, td, ul {
        border: 2px solid black;

        /* padding: 8px; */
    }
    th {
        background-color: #002060;
        color: #fff;
    }
    h3 {
        text-align: center;
    }
    ul{
        padding:10px;
        margin: 10px;
    }
</style>
<body>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 2px solid black;">
                    <div class="card-header">
                        <h3 class="card-title">Orden de Pedido </h3>
                    </div>

                    <div class="card-body">
                        <table class="table" style="border-collapse: collapse; border: 1px solid black;">
                             <tr style="height: 20px;">
                                    <th style="border: 1px solid; height: 20px;">Nro</th>
                                    <th  style="border: 1px solid; height: 20px;">
                                        {{ $order->id }}
                                    </th>
                                    <th  style="border: 1px solid; height: 20px;">Fecha</th>
                                    <th  colspan="4" style="border: 1px solid; height: 20px; width: 100px;">
                                        {{$dateFormat}}
                                    </th>
                                </tr>
                            <thead>
                                <tr>
                                    <th style="border: 1px solid;">Cliente</th>
                                    <th  style="border: 1px solid;">Rif / Ci</th>
                                    <th  style="border: 1px solid;">Destino</th>
                                    <th  style="border: 1px solid; width: 50px;">Tipo de Despacho</th>
                                    <th  style="border: 1px solid;">Producto</th>
                                    <th  style="border: 1px solid;">Color</th>
                                    <th  style="border: 1px solid;">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td  style="border: 1px solid;  text-align: center;">{{ $order->name }}</td>
                                    <td  style="border: 1px solid;  text-align: center;">{{ $order->rif }}</td>
                                    <td  style="border: 1px solid;  text-align: center;">{{ optional($order->Destination)->name }}</td>
                                    <td  style="border: 1px solid;  text-align: center;">{{ optional($order->movementDetail)->name }}</td>
                                    @if ($orderFinishedProducts)
                                    <td  style="border: 1px solid;">
                                        @foreach ($orderFinishedProducts as $orderFinishedProduct)
                                            <ul>{{ $orderFinishedProduct->name }}</ul>
                                        @endforeach
                                    </td>
                                     <td  style="border: 1px solid;">
                                        @foreach ($orderFinishedProducts as $orderFinishedProduct)
                                            <ul>{{ $orderFinishedProduct->color->name }}</ul>
                                        @endforeach
                                    </td>
                                    <td  style="border: 1px solid;">
                                        @foreach ($orderFinishedProducts as $orderFinishedProduct)
                                           <ul> {{ $orderFinishedProduct->pivot->amount }}</ul>
                                        @endforeach
                                    </td>

                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
