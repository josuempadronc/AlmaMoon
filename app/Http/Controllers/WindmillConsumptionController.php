<?php

namespace App\Http\Controllers;

use App\Models\WindmillConsumption;
use App\Models\TypeMovement;
use App\Models\Measure;
use App\Models\FinishedProduct;
use Illuminate\Http\Request;

/**
 * Class WindmillConsumptionController
 * @package App\Http\Controllers
 */
class WindmillConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $windmillConsumptions = WindmillConsumption::paginate();

        return view('Molino/windmill-consumption.index', compact('windmillConsumptions'))
            ->with('i', (request()->input('page', 1) - 1) * $windmillConsumptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $windmillConsumption = new WindmillConsumption();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        return view(
            'Molino/windmill-consumption.create',
            compact(
                'windmillConsumption',
                'typeMovement',
                'measure',
                'finishedProduct'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(WindmillConsumption::$rules);

        $windmillConsumption = WindmillConsumption::create($request->all());

        return redirect()->route('windmill-consumptions.index')
            ->with('success', 'WindmillConsumption created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $windmillConsumption = WindmillConsumption::find($id);

        return view('Molino/windmill-consumption.show', compact('windmillConsumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $windmillConsumption = WindmillConsumption::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');
        $finishedProduct = FinishedProduct::pluck('name', 'id');

        return view(
            'Molino/windmill-consumption.edit',
            compact(
                'windmillConsumption',
                'typeMovement',
                'measure',
                'finishedProduct'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WindmillConsumption $windmillConsumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WindmillConsumption $windmillConsumption)
    {
        request()->validate(WindmillConsumption::$rules);

        $windmillConsumption->update($request->all());

        return redirect()->route('windmill-consumptions.index')
            ->with('success', 'WindmillConsumption updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $windmillConsumption = WindmillConsumption::find($id)->delete();

        return redirect()->route('windmill-consumptions.index')
            ->with('success', 'WindmillConsumption deleted successfully');
    }
}
