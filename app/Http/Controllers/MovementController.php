<?php

namespace App\Http\Controllers;

use App\Models\AssembledProduct;
use App\Models\Destination;
use App\Models\FinishedProduct;
use App\Models\Location;
use App\Models\Movement;
use App\Models\Origin;
use App\Models\MovementDetail;
use App\Models\TypeMovement;
use Illuminate\Http\Request;
use App\Helpers\CustomHelper;

/**
 * Class MovementController
 * @package App\Http\Controllers
 */
class MovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movements = Movement::paginate();
        // dd($movements);

        return view('movement.index', compact('movements'))
            ->with('i', (request()->input('page', 1) - 1) * $movements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movement = new Movement();
        $typeMovement = TypeMovement::pluck('name','id');
        $movementDetail = MovementDetail::pluck('name','id');
        $location = Location::pluck('name');
        $origin = Origin::pluck('name','id');
        $FinishedProduct = FinishedProduct::pluck('name','id');
        $AssembledProduct = AssembledProduct::pluck('name','id');
        $Destination = Destination::pluck('name','id');

        // $SaveStock =

        return view('movement.create',
        compact(
            'movement',
            'typeMovement',
            'movementDetail',
            'location',
            'origin',
            'FinishedProduct',
            'AssembledProduct',
            'Destination'
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
        request()->validate(Movement::$rules);

        $movement = Movement::create($request->all());

        return redirect()->route('movements.index')
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
        $movement = Movement::find($id);

        return view('movement.show', compact('movement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movement = Movement::find($id);
        $typeMovement = TypeMovement::pluck('name','id');
        $movementDetail = MovementDetail::pluck('name','id');
        $location = Location::pluck('name','id');
        $origin = Origin::pluck('name','id');
        $FinishedProduct = FinishedProduct::pluck('name','id');
        $AssembledProduct = AssembledProduct::pluck('name','id');
        $Destination = Destination::pluck('name','id');

        return view('movement.edit', compact(
            'movement',
            'typeMovement',
            'movementDetail',
            'location',
            'origin',
            'FinishedProduct',
            'AssembledProduct',
            'Destination'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Movement $movement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movement $movement)
    {
        request()->validate(Movement::$rules);

        $movement->update($request->all());

        return redirect()->route('movements.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movement = Movement::find($id)->delete();

        return redirect()->route('movements.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}

