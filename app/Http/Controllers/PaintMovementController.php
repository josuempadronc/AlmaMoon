<?php

namespace App\Http\Controllers;

use App\Models\PaintMovement;
use App\Models\TypeMovement;
use App\Models\Measure;
use App\Models\Origin;
use Illuminate\Http\Request;

/**
 * Class PaintMovementController
 * @package App\Http\Controllers
 */
class PaintMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paintMovements = PaintMovement::paginate();

        return view('Pintura/paint-movement.index', compact('paintMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $paintMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paintMovement = new PaintMovement();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        return view(
            'Pintura/paint-movement.create',
            compact(
                'paintMovement',
                'typeMovement',
                'measure',
                'origin'
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
        request()->validate(PaintMovement::$rules);

        $paintMovement = PaintMovement::create($request->all());

        return redirect()->route('paint-movements.index')
            ->with('success', 'PaintMovement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paintMovement = PaintMovement::find($id);

        return view('Pintura/paint-movement.show', compact('paintMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paintMovement = PaintMovement::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        return view(
            'Pintura/paint-movement.edit',
            compact(
                'paintMovement',
                'typeMovement',
                'measure',
                'origin'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PaintMovement $paintMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaintMovement $paintMovement)
    {
        request()->validate(PaintMovement::$rules);

        $paintMovement->update($request->all());

        return redirect()->route('paint-movements.index')
            ->with('success', 'PaintMovement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paintMovement = PaintMovement::find($id)->delete();

        return redirect()->route('paint-movements.index')
            ->with('success', 'PaintMovement deleted successfully');
    }
}
