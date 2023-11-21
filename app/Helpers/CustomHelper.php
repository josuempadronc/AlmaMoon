<?php

use App\Models\FinishedProduct;
use App\Models\Order;
use App\Models\Movement;
use Illuminate\Support\Carbon;

function Dashboard()
{

    // Productos
    $FinishedProduct = FinishedProduct::get();
    $groupProduct = $FinishedProduct->groupBy('name');
    $totalCount = FinishedProduct::groupBy('name')
        ->selectRaw(FinishedProduct::raw('SUM(stock) as total'))->get();
    // End Productos

    // Pedidos
    $orders = Order::get();

     // End Pedidos

    return (
        compact(
            'FinishedProduct',
            'groupProduct',
            'totalCount',
            'orders',
        )
    );
}

function Statistic()
{

    $fechaInicio = Carbon::parse('2023-01-31');
    $fechaFin = Carbon::parse('2023-01-31');


    $registros = Movement::join('finished_products', 'movements.finishedProduct_id', '=', 'finished_products.id')
        ->select('movements.date', 'movements.amount', 'finished_products.name', 'finished_products.color_id', 'finished_products.paw_id')
        ->whereBetween('movements.date', [$fechaInicio, $fechaFin])
        ->where('typeMovement_id', '1')
        ->get();
    return (
        compact(
            'registros',
        )
    );
}
