<?php

namespace App\Http\Controllers;

use App\Models\MechanicsConsumption;
use Illuminate\Http\Request;

/**
 * Class MechanicsConsumptionController
 * @package App\Http\Controllers
 */
class MechanicsConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanicsConsumptions = MechanicsConsumption::paginate();

        return view('MetalMecanica/mechanics-consumption.index', compact('mechanicsConsumptions'))
            ->with('i', (request()->input('page', 1) - 1) * $mechanicsConsumptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanicsConsumption = new MechanicsConsumption();
        return view('MetalMecanica/mechanics-consumption.create', compact('mechanicsConsumption'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MechanicsConsumption::$rules);

        $mechanicsConsumption = MechanicsConsumption::create($request->all());

        return redirect()->route('mechanics-consumptions.index')
            ->with('success', 'MechanicsConsumption created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mechanicsConsumption = MechanicsConsumption::find($id);

        return view('MetalMecanica/mechanics-consumption.show', compact('mechanicsConsumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanicsConsumption = MechanicsConsumption::find($id);

        return view('MetalMecanica/mechanics-consumption.edit', compact('mechanicsConsumption'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MechanicsConsumption $mechanicsConsumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MechanicsConsumption $mechanicsConsumption)
    {
        request()->validate(MechanicsConsumption::$rules);

        $mechanicsConsumption->update($request->all());

        return redirect()->route('mechanics-consumptions.index')
            ->with('success', 'MechanicsConsumption updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mechanicsConsumption = MechanicsConsumption::find($id)->delete();

        return redirect()->route('mechanics-consumptions.index')
            ->with('success', 'MechanicsConsumption deleted successfully');
    }
}
