<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Location;
use App\Models\Origin;
use App\Models\RawMaterial;
use App\Models\RawMaterialMovement;
use App\Models\TypeMovement;
use App\Models\Supplier;
use Illuminate\Http\Request;

/**
 * Class RawMaterialMovementController
 * @package App\Http\Controllers
 */
class RawMaterialMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawMaterialMovements = RawMaterialMovement::paginate();

        return view('raw-material-movement.index', compact('rawMaterialMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $rawMaterialMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawMaterialMovement = new RawMaterialMovement();
        $TypeMovement = TypeMovement::pluck('name', 'id');
        $supplier = Supplier::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');
        $origin = Origin::pluck('name','id');
        $destination = Destination::pluck('name','id');
        $location = Location::pluck('name','id');
        return view('raw-material-movement.create',
        compact(
            'rawMaterialMovement',
            'TypeMovement',
            'rawMaterial',
            'destination',
            'location',
            'supplier',
            'origin',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RawMaterialMovement::$rules);

        $rawMaterialMovement = RawMaterialMovement::create($request->all());

        return redirect()->route('raw-material-movements.index')
            ->with('success', 'Informacion guardada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rawMaterialMovement = RawMaterialMovement::find($id);

        return view('raw-material-movement.show', compact('rawMaterialMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rawMaterialMovement = RawMaterialMovement::find($id);
        $TypeMovement = TypeMovement::pluck('name', 'id');
        $supplier = Supplier::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');
        $origin = Origin::pluck('name','id');
        $destination = Destination::pluck('name','id');
        $location = Location::pluck('name','id');
        return view('raw-material-movement.edit',
        compact(
            'rawMaterialMovement',
            'TypeMovement',
            'rawMaterial',
            'destination',
            'location',
            'supplier',
            'origin',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RawMaterialMovement $rawMaterialMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawMaterialMovement $rawMaterialMovement)
    {
        request()->validate(RawMaterialMovement::$rules);

        $rawMaterialMovement->update($request->all());

        return redirect()->route('raw-material-movements.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rawMaterialMovement = RawMaterialMovement::find($id)->delete();

        return redirect()->route('raw-material-movements.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
