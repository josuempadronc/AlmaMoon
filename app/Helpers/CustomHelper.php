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
