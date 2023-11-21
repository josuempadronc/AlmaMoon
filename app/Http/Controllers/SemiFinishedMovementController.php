<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Origin;
use App\Models\Measure;
use App\Models\SemiFinishedProduct;
use App\Models\SemiFinishedMovement;
use App\Models\Supplier;
use App\Models\TypeMovement;
use Illuminate\Http\Request;

/**
 * Class SemiFinishedMovementController
 * @package App\Http\Controllers
 */
class SemiFinishedMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semiFinishedMovements = SemiFinishedMovement::paginate();

        return view('semi-finished-movement.index', compact('semiFinishedMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $semiFinishedMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semiFinishedMovement = new SemiFinishedMovement();
        $typeMovement = TypeMovement::pluck('name','id');
        $supplier = Supplier::pluck('name','id');
        $semifinishedProduct = SemiFinishedProduct::pluck('name','id');
        $measure = Measure::pluck('name','id');
        $origin = Origin::pluck('name','id');
        $destination = Destination::pluck('name','id');
        return view('semi-finished-movement.create',
        compact(
            'semiFinishedMovement',
            'typeMovement',
            'supplier',
            'semifinishedProduct',
            'measure',
            'origin',
            'destination',
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
        request()->validate(SemiFinishedMovement::$rules);

        $semiFinishedMovement = SemiFinishedMovement::create($request->all());

        return redirect()->route('semi-finished-movements.index')
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
        $semiFinishedMovement = SemiFinishedMovement::find($id);

        return view('semi-finished-movement.show', compact('semiFinishedMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semiFinishedMovement = SemiFinishedMovement::find($id);

        return view('semi-finished-movement.edit', compact('semiFinishedMovement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SemiFinishedMovement $semiFinishedMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SemiFinishedMovement $semiFinishedMovement)
    {
        request()->validate(SemiFinishedMovement::$rules);

        $semiFinishedMovement->update($request->all());

        return redirect()->route('semi-finished-movements.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $semiFinishedMovement = SemiFinishedMovement::find($id)->delete();

        return redirect()->route('semi-finished-movements.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
