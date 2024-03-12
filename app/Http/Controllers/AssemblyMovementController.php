<?php

namespace App\Http\Controllers;

use App\Models\AssemblyMovement;
use Illuminate\Http\Request;

/**
 * Class AssemblyMovementController
 * @package App\Http\Controllers
 */
class AssemblyMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemblyMovements = AssemblyMovement::paginate();

        return view('Ensamble/assembly-movement.index', compact('assemblyMovements'))
            ->with('i', (request()->input('page', 1) - 1) * $assemblyMovements->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assemblyMovement = new AssemblyMovement();
        return view('Ensamble/assembly-movement.create', compact('assemblyMovement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AssemblyMovement::$rules);

        $assemblyMovement = AssemblyMovement::create($request->all());

        return redirect()->route('assembly-movements.index')
            ->with('success', 'AssemblyMovement created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assemblyMovement = AssemblyMovement::find($id);

        return view('Ensamble/assembly-movement.show', compact('assemblyMovement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assemblyMovement = AssemblyMovement::find($id);

        return view('Ensamble/assembly-movement.edit', compact('assemblyMovement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AssemblyMovement $assemblyMovement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssemblyMovement $assemblyMovement)
    {
        request()->validate(AssemblyMovement::$rules);

        $assemblyMovement->update($request->all());

        return redirect()->route('assembly-movements.index')
            ->with('success', 'AssemblyMovement updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assemblyMovement = AssemblyMovement::find($id)->delete();

        return redirect()->route('assembly-movements.index')
            ->with('success', 'AssemblyMovement deleted successfully');
    }
}
