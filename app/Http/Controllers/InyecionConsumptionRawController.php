<?php

namespace App\Http\Controllers;

use App\Models\InyecionConsumptionRaw;
use App\models\FinishedProduct;
use App\Models\TypeMovement;
use App\models\RawMaterial;
use App\Models\Destination;
use Illuminate\Http\Request;

/**
 * Class InyecionConsumptionRawController
 * @package App\Http\Controllers
 */
class InyecionConsumptionRawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inyecionConsumptionRaws = InyecionConsumptionRaw::paginate();

        return view('Inyeccion/inyecion-consumption-raw.index', compact('inyecionConsumptionRaws'))
            ->with('i', (request()->input('page', 1) - 1) * $inyecionConsumptionRaws->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inyecionConsumptionRaw = new InyecionConsumptionRaw();
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $destination = Destination::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');
        return view(
            'Inyeccion/inyecion-consumption-raw.create',
            compact(
                'inyecionConsumptionRaw',
                'finishedProduct',
                'typeMovement',
                'destination',
                'rawMaterial',
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
        request()->validate(InyecionConsumptionRaw::$rules);

        $inyecionConsumptionRaw = InyecionConsumptionRaw::create($request->all());

        return redirect()->route('inyecion-consumption-raws.index')
            ->with('success', 'InyecionConsumptionRaw created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inyecionConsumptionRaw = InyecionConsumptionRaw::find($id);

        return view('Inyeccion/inyecion-consumption-raw.show', compact('inyecionConsumptionRaw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inyecionConsumptionRaw = InyecionConsumptionRaw::find($id);
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $destination = Destination::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');

        return view(
            'Inyeccion/inyecion-consumption-raw.edit',
            compact(
                'inyecionConsumptionRaw',
                'finishedProduct',
                'typeMovement',
                'destination',
                'rawMaterial',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InyecionConsumptionRaw $inyecionConsumptionRaw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InyecionConsumptionRaw $inyecionConsumptionRaw)
    {
        request()->validate(InyecionConsumptionRaw::$rules);

        $inyecionConsumptionRaw->update($request->all());

        return redirect()->route('inyecion-consumption-raws.index')
            ->with('success', 'InyecionConsumptionRaw updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inyecionConsumptionRaw = InyecionConsumptionRaw::find($id)->delete();

        return redirect()->route('inyecion-consumption-raws.index')
            ->with('success', 'InyecionConsumptionRaw deleted successfully');
    }
}
