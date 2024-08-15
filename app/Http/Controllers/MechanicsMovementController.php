<?php

namespace App\Http\Controllers;

use App\Models\MechanicsMovement;
use App\Models\TypeMovement;
use App\Models\Origin;
use App\Models\Supplier;
use Illuminate\Http\Request;

/**
 * Class MechanicsMovementController
 * @package App\Http\Controllers
 */
class MechanicsMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanicsMovements = MechanicsMovement::paginate();

        return view('MetalMecanica/mechanics-movement.index', compact('mechanicsMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $mechanicsMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanicsMovement = new MechanicsMovement();
        $typesMovement = TypeMovement::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        $supplier = Supplier::pluck('name', 'id');
        return view(
            'MetalMecanica/mechanics-movement.create',
            compact(
                'mechanicsMovement',
                'typesMovement',
                'origin',
                'supplier'
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
        request()->validate(MechanicsMovement::$rules);

        $mechanicsMovement = MechanicsMovement::create($request->all());

        return redirect()->route('mechanics-movements.index')
            ->with('success', 'MechanicsMovement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mechanicsMovement = MechanicsMovement::find($id);

        return view('MetalMecanica/mechanics-movement.show', compact('mechanicsMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanicsMovement = MechanicsMovement::find($id);
        $typesMovement = TypeMovement::pluck('name', 'id');
        $origin = Origin::pluck('name', 'id');
        $supplier = Supplier::pluck('name', 'id');
        return view(
            'MetalMecanica/mechanics-movement.edit',
            compact(
                '
        mechanicsMovement',
                'typesMovement',
                'origin',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MechanicsMovement $mechanicsMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MechanicsMovement $mechanicsMovement)
    {
        request()->validate(MechanicsMovement::$rules);

        $mechanicsMovement->update($request->all());

        return redirect()->route('mechanics-movements.index')
            ->with('success', 'MechanicsMovement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mechanicsMovement = MechanicsMovement::find($id)->delete();

        return redirect()->route('mechanics-movements.index')
            ->with('success', 'MechanicsMovement deleted successfully');
    }
}
