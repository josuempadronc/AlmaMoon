<?php

namespace App\Http\Controllers;

use App\Models\InyecionConsumptionSemiFinished;
use App\models\FinishedProduct;
use App\Models\TypeMovement;
use App\Models\Color;
use App\Models\Paw;
use App\Models\Destination;
use App\Models\Location;
use Illuminate\Http\Request;

/**
 * Class InyecionConsumptionSemiFinishedController
 * @package App\Http\Controllers
 */
class InyecionConsumptionSemiFinishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inyecionConsumptionSemiFinisheds = InyecionConsumptionSemiFinished::paginate();

        return view('Inyeccion/inyecion-consumption-semi-finished.index', compact('inyecionConsumptionSemiFinisheds'))
            ->with('i', (request()->input('page', 1) - 1) * $inyecionConsumptionSemiFinisheds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inyecionConsumptionSemiFinished = new InyecionConsumptionSemiFinished();
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');
        $destination = Destination::pluck('name', 'id');
        $location = Location::pluck('name', 'id');
        return view(
            'Inyeccion/inyecion-consumption-semi-finished.create',
            compact(
                'inyecionConsumptionSemiFinished',
                'finishedProduct',
                'typeMovement',
                'colors',
                'paw',
                'destination',
                'location',
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
        request()->validate(InyecionConsumptionSemiFinished::$rules);

        $inyecionConsumptionSemiFinished = InyecionConsumptionSemiFinished::create($request->all());

        return redirect()->route('inyecion-consumption-semi-finisheds.index')
            ->with('success', 'InyecionConsumptionSemiFinished created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inyecionConsumptionSemiFinished = InyecionConsumptionSemiFinished::find($id);

        return view('Inyeccion/inyecion-consumption-semi-finished.show', compact('inyecionConsumptionSemiFinished'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inyecionConsumptionSemiFinished = InyecionConsumptionSemiFinished::find($id);
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');
        $destination = Destination::pluck('name', 'id');
        $location = Location::pluck('name', 'id');

        return view('Inyeccion/inyecion-consumption-semi-finished.edit',
        compact(
            'inyecionConsumptionSemiFinished',
            'finishedProduct',
                'typeMovement',
                'colors',
                'paw',
                'destination',
                'location',
        )
    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InyecionConsumptionSemiFinished $inyecionConsumptionSemiFinished
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InyecionConsumptionSemiFinished $inyecionConsumptionSemiFinished)
    {
        request()->validate(InyecionConsumptionSemiFinished::$rules);

        $inyecionConsumptionSemiFinished->update($request->all());

        return redirect()->route('inyecion-consumption-semi-finisheds.index')
            ->with('success', 'InyecionConsumptionSemiFinished updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inyecionConsumptionSemiFinished = InyecionConsumptionSemiFinished::find($id)->delete();

        return redirect()->route('inyecion-consumption-semi-finisheds.index')
            ->with('success', 'InyecionConsumptionSemiFinished deleted successfully');
    }
}
