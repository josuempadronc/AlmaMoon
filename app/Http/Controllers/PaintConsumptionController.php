<?php

namespace App\Http\Controllers;

use App\Models\PaintConsumption;
use App\Models\TypeMovement;
use App\Models\Measure;
use Illuminate\Http\Request;

/**
 * Class PaintConsumptionController
 * @package App\Http\Controllers
 */
class PaintConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paintConsumptions = PaintConsumption::paginate();

        return view('Pintura/paint-consumption.index', compact('paintConsumptions'))
            ->with('i', (request()->input('page', 1) - 1) * $paintConsumptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paintConsumption = new PaintConsumption();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');
        return view(
            'Pintura/paint-consumption.create',
            compact(
                'paintConsumption',
                'typeMovement',
                'measure'
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
        request()->validate(PaintConsumption::$rules);

        $paintConsumption = PaintConsumption::create($request->all());

        return redirect()->route('paint-consumptions.index')
            ->with('success', 'PaintConsumption created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paintConsumption = PaintConsumption::find($id);

        return view('Pintura/paint-consumption.show', compact('paintConsumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paintConsumption = PaintConsumption::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');
        return view(
            'Pintura/paint-consumption.edit',
            compact(
                'paintConsumption',
                'typeMovement',
                'measure'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PaintConsumption $paintConsumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaintConsumption $paintConsumption)
    {
        request()->validate(PaintConsumption::$rules);

        $paintConsumption->update($request->all());

        return redirect()->route('paint-consumptions.index')
            ->with('success', 'PaintConsumption updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paintConsumption = PaintConsumption::find($id)->delete();

        return redirect()->route('paint-consumptions.index')
            ->with('success', 'PaintConsumption deleted successfully');
    }
}
