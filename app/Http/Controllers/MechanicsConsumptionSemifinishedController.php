<?php

namespace App\Http\Controllers;

use App\Models\MechanicsConsumptionSemifinished;
use App\Models\TypeMovement;
use App\Models\MechanicsSemifinished;
use App\Models\MechanicsProduct;
use Illuminate\Http\Request;

/**
 * Class MechanicsConsumptionSemifinishedController
 * @package App\Http\Controllers
 */
class MechanicsConsumptionSemifinishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanicsConsumptionSemifinisheds = MechanicsConsumptionSemifinished::paginate();

        return view('MetalMecanica/mechanics-consumption-semifinished.index', compact('mechanicsConsumptionSemifinisheds'))
            ->with('i', (request()->input('page', 1) - 1) * $mechanicsConsumptionSemifinisheds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanicsConsumptionSemifinished = new MechanicsConsumptionSemifinished();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $semifinished = MechanicsSemifinished::pluck('name', 'id');
        $product = MechanicsProduct::pluck('name', 'id');

        return view(
            'MetalMecanica/mechanics-consumption-semifinished.create',
            compact(
                'mechanicsConsumptionSemifinished',
                'typeMovement',
                'semifinished',
                'product'
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
        request()->validate(MechanicsConsumptionSemifinished::$rules);

        $mechanicsConsumptionSemifinished = MechanicsConsumptionSemifinished::create($request->all());

        return redirect()->route('mechanicsconsumptionsemifinisheds.index')
            ->with('success', 'MechanicsConsumptionSemifinished created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mechanicsConsumptionSemifinished = MechanicsConsumptionSemifinished::find($id);

        return view('MetalMecanica/mechanics-consumption-semifinished.show', compact('mechanicsConsumptionSemifinished'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanicsConsumptionSemifinished = MechanicsConsumptionSemifinished::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $semifinished = MechanicsSemifinished::pluck('name', 'id');
        $product = MechanicsProduct::pluck('name', 'id');
        return view(
            'MetalMecanica/mechanics-consumption-semifinished.edit',
            compact(
                'mechanicsConsumptionSemifinished',
                'typeMovement',
                'semifinished',
                'product'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MechanicsConsumptionSemifinished $mechanicsConsumptionSemifinished
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MechanicsConsumptionSemifinished $mechanicsConsumptionSemifinished)
    {
        request()->validate(MechanicsConsumptionSemifinished::$rules);

        $mechanicsConsumptionSemifinished->update($request->all());

        return redirect()->route('mechanicsconsumptionsemifinisheds.index')
            ->with('success', 'MechanicsConsumptionSemifinished updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mechanicsConsumptionSemifinished = MechanicsConsumptionSemifinished::find($id)->delete();

        return redirect()->route('mechanicsconsumptionsemifinisheds.index')
            ->with('success', 'MechanicsConsumptionSemifinished deleted successfully');
    }
}
