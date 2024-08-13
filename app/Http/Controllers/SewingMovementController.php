<?php

namespace App\Http\Controllers;

use App\Models\SewingMovement;
use App\models\TypeMovement;
use App\Models\RawMaterial;
use App\models\Color;
use App\models\Origin;
use App\Models\Supplier;
use Illuminate\Http\Request;

/**
 * Class SewingMovementController
 * @package App\Http\Controllers
 */
class SewingMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewingMovements = SewingMovement::paginate();

        return view('Costura/sewing-movement.index', compact('sewingMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $sewingMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewingMovement = new SewingMovement();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');
        $color = Color::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        $Supplier = Supplier::pluck('name', 'id');
        return view(
            'Costura/sewing-movement.create',
            compact(
                'sewingMovement',
                'typeMovement',
                'rawMaterial',
                'color',
                'origin',
                'Supplier'
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
        request()->validate(SewingMovement::$rules);

        $sewingMovement = SewingMovement::create($request->all());

        return redirect()->route('sewing-movements.index')
            ->with('success', 'SewingMovement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewingMovement = SewingMovement::find($id);

        return view('Costura/sewing-movement.show', compact('sewingMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sewingMovement = SewingMovement::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $rawMaterial = RawMaterial::pluck('name', 'id');
        $color = Color::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        $Supplier = Supplier::pluck('name', 'id');
        return view(
            'sewing-movement.edit',
            compact(
                'sewingMovement',
                'typeMovement',
                'rawMaterial',
                'color',
                'origin',
                'Supplier'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SewingMovement $sewingMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SewingMovement $sewingMovement)
    {
        request()->validate(SewingMovement::$rules);

        $sewingMovement->update($request->all());

        return redirect()->route('sewing-movements.index')
            ->with('success', 'SewingMovement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sewingMovement = SewingMovement::find($id)->delete();

        return redirect()->route('sewing-movements.index')
            ->with('success', 'SewingMovement deleted successfully');
    }
}
