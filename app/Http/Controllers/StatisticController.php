<?php

namespace App\Http\Controllers;

use App\Helpers\StatisticHelper;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function show(Request $request)
    {


        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');


        $data = StatisticHelper::Datos($request, $fechaInicio, $fechaFin);

        // dd($resultados);


        return view('statistics.statistics', compact('data'));
    }
}
