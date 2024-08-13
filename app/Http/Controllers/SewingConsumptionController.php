<?php

namespace App\Http\Controllers;

use App\Models\SewingConsumption;
use App\Models\TypeMovement;
use App\Models\RawMaterial;
use App\Models\Color;
use Illuminate\Http\Request;

/**
 * Class SewingConsumptionController
 * @package App\Http\Controllers
 */
class SewingConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewingConsumptions = SewingConsumption::paginate();

        return view('Costura/sewing-consumption.index', compact('sewingConsumptions'))
            ->with('i', (request()->input('page', 1) - 1) * $sewingConsumptions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewingConsumption = new SewingConsumption();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');
        $color = Color::pluck('name', 'id');
        return view(
            'Costura/sewing-consumption.create',
            compact(
                'sewingConsumption',
                'typeMovement',
                'rawMaterial',
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
        request()->validate(SewingConsumption::$rules);

        $sewingConsumption = SewingConsumption::create($request->all());

        return redirect()->route('sewing-consumptions.index')
            ->with('success', 'SewingConsumption created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewingConsumption = SewingConsumption::find($id);

        return view('Costura/sewing-consumption.show', compact('sewingConsumption'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sewingConsumption = SewingConsumption::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');
        $color = Color::pluck('name', 'id');
        return view(
            'Costura/sewing-consumption.edit',
            compact(
                'sewingConsumption',
                'typeMovement',
                'rawMaterial',
                'color'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SewingConsumption $sewingConsumption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SewingConsumption $sewingConsumption)
    {
        request()->validate(SewingConsumption::$rules);

        $sewingConsumption->update($request->all());

        return redirect()->route('sewing-consumptions.index')
            ->with('success', 'SewingConsumption updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sewingConsumption = SewingConsumption::find($id)->delete();

        return redirect()->route('sewing-consumptions.index')
            ->with('success', 'SewingConsumption deleted successfully');
    }
}
