<?php
namespace App\Helpers;

use App\Models\Movement;
use Illuminate\Http\Request;


class StatisticHelper
{
    public static function Datos(Request $request, $fechaInicio, $fechaFin)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        if (empty($fechaInicio)) {
            $fechaInicio = date('Y-m-d');
        }
        if (empty($fechaFin)) {
            $fechaFin = date('Y-m-d');
        }


        $registros = Movement::join('finished_products', 'movements.finishedProduct_id', '=', 'finished_products.id')
            ->select('movements.date', 'movements.amount', 'finished_products.name', 'finished_products.color_id', 'finished_products.paw_id')
            ->whereBetween('movements.date', [$fechaInicio, $fechaFin])
            ->where('typeMovement_id', '1')
            ->get();

        return compact('registros');
    }
}
