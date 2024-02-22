<?php

use App\Models\FinishedProduct;
use App\Models\SemiFinishedProduct;
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

    // Producto Semiterminado

    $FinishedProductSemi = SemiFinishedProduct::get();
    $groupProductSemi = $FinishedProductSemi->groupBy('name');
    $totalCountPs = SemiFinishedProduct::groupBy('name')
        ->selectRaw(SemiFinishedProduct::raw('SUM(stock) as total'))->get();

    // End Producto Semiterminado

    // Pedidos
    $orders = Order::where('status','Pendiente')->get();

     // End Pedidos

    return (
        compact(
            'FinishedProduct',
            'groupProduct',
            'totalCount',
            'orders',
            'groupProductSemi',
        )
    );
}
