<?php

namespace App\Http\Controllers;

use App\Models\TypeMovement;
use Illuminate\Http\Request;

/**
 * Class TypeMovementController
 * @package App\Http\Controllers
 */
class TypeMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeMovements = TypeMovement::paginate();

        return view('type-movement.index', compact('typeMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $typeMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeMovement = new TypeMovement();
        return view('type-movement.create', compact('typeMovement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeMovement::$rules);

        $typeMovement = TypeMovement::create($request->all());

        return redirect()->route('type-movements.index')
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
        $typeMovement = TypeMovement::find($id);

        return view('type-movement.show', compact('typeMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeMovement = TypeMovement::find($id);

        return view('type-movement.edit', compact('typeMovement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeMovement $typeMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeMovement $typeMovement)
    {
        request()->validate(TypeMovement::$rules);

        $typeMovement->update($request->all());

        return redirect()->route('type-movements.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeMovement = TypeMovement::find($id)->delete();

        return redirect()->route('type-movements.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
