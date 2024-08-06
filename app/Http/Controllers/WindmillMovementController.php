<?php

namespace App\Http\Controllers;

use App\Models\WindmillMovement;
use App\Models\TypeMovement;
use App\Models\Origin;
use App\Models\Measure;
use Illuminate\Http\Request;

/**
 * Class WindmillMovementController
 * @package App\Http\Controllers
 */
class WindmillMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $windmillMovements = WindmillMovement::paginate();

        return view('Molino/windmill-movement.index', compact('windmillMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $windmillMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $windmillMovement = new WindmillMovement();
        $typeMovement = TypeMovement::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');

        return view(
            'Molino/windmill-movement.create',
            compact(
                'windmillMovement',
                'typeMovement',
                'origin',
                'measure'
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
        request()->validate(WindmillMovement::$rules);

        $windmillMovement = WindmillMovement::create($request->all());

        return redirect()->route('windmill-movements.index')
            ->with('success', 'WindmillMovement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $windmillMovement = WindmillMovement::find($id);

        return view('Molino/windmill-movement.show', compact('windmillMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $windmillMovement = WindmillMovement::find($id);
        $typeMovement = TypeMovement::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        $measure = Measure::pluck('name', 'id');

        return view(
            'Molino/windmill-movement.edit',
            compact(
                'windmillMovement',
                'typeMovement',
                'origin',
                'measure'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WindmillMovement $windmillMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WindmillMovement $windmillMovement)
    {
        request()->validate(WindmillMovement::$rules);

        $windmillMovement->update($request->all());

        return redirect()->route('windmill-movements.index')
            ->with('success', 'WindmillMovement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $windmillMovement = WindmillMovement::find($id)->delete();

        return redirect()->route('windmill-movements.index')
            ->with('success', 'WindmillMovement deleted successfully');
    }
}
