<?php

namespace App\Http\Controllers;

use App\Models\SewingConsumptionSemifinished;
use App\Models\TypeMovement;
use App\Models\SemiFinishedProduct;
use App\Models\Color;
use Illuminate\Http\Request;

/**
 * Class SewingConsumptionSemifinishedController
 * @package App\Http\Controllers
 */
class SewingConsumptionSemifinishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewingConsumptionSemifinisheds = SewingConsumptionSemifinished::paginate();

        return view('Costura/sewing-consumption-semifinished.index', compact('sewingConsumptionSemifinisheds'))
            ->with('i', (request()->input('page', 1) - 1) * $sewingConsumptionSemifinisheds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewingConsumptionSemifinished = new SewingConsumptionSemifinished();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $semiFinishedProduct = SemiFinishedProduct::pluck('name', 'id');
        $color = Color::pluck('name', 'id');
        return view(
            'Costura/sewing-consumption-semifinished.create',
            compact(
                'sewingConsumptionSemifinished',
                'typeMovement',
                'semiFinishedProduct',
                'color'
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
        request()->validate(SewingConsumptionSemifinished::$rules);

        $sewingConsumptionSemifinished = SewingConsumptionSemifinished::create($request->all());

        return redirect()->route('sewing-consumption-semifinisheds.index')
            ->with('success', 'SewingConsumptionSemifinished created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewingConsumptionSemifinished = SewingConsumptionSemifinished::find($id);

        return view('Costura/sewing-consumption-semifinished.show', compact('sewingConsumptionSemifinished'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sewingConsumptionSemifinished = SewingConsumptionSemifinished::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $semiFinishedProduct = SemiFinishedProduct::pluck('name', 'id');
        $color = Color::pluck('name', 'id');
        return view(
            'Costura/sewing-consumption-semifinished.edit',
            compact(
                'sewingConsumptionSemifinished',
                'typeMovement',
                'semiFinishedProduct',
                'color'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SewingConsumptionSemifinished $sewingConsumptionSemifinished
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SewingConsumptionSemifinished $sewingConsumptionSemifinished)
    {
        request()->validate(SewingConsumptionSemifinished::$rules);

        $sewingConsumptionSemifinished->update($request->all());

        return redirect()->route('sewing-consumption-semifinisheds.index')
            ->with('success', 'SewingConsumptionSemifinished updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sewingConsumptionSemifinished = SewingConsumptionSemifinished::find($id)->delete();

        return redirect()->route('sewing-consumption-semifinisheds.index')
            ->with('success', 'SewingConsumptionSemifinished deleted successfully');
    }
}
