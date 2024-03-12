<?php

namespace App\Http\Controllers;

use App\Models\AssemblyMovementInput;
use Illuminate\Http\Request;

/**
 * Class AssemblyMovementInputController
 * @package App\Http\Controllers
 */
class AssemblyMovementInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemblyMovementInputs = AssemblyMovementInput::paginate();

        return view('Ensamble/assembly-movement-input.index', compact('assemblyMovementInputs'))
            ->with('i', (request()->input('page', 1) - 1) * $assemblyMovementInputs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assemblyMovementInput = new AssemblyMovementInput();
        return view('Ensamble/assembly-movement-input.create', compact('assemblyMovementInput'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AssemblyMovementInput::$rules);

        $assemblyMovementInput = AssemblyMovementInput::create($request->all());

        return redirect()->route('assembly-movement-inputs.index')
            ->with('success', 'AssemblyMovementInput created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assemblyMovementInput = AssemblyMovementInput::find($id);

        return view('Ensamble/assembly-movement-input.show', compact('assemblyMovementInput'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assemblyMovementInput = AssemblyMovementInput::find($id);

        return view('Ensamble/assembly-movement-input.edit', compact('assemblyMovementInput'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AssemblyMovementInput $assemblyMovementInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssemblyMovementInput $assemblyMovementInput)
    {
        request()->validate(AssemblyMovementInput::$rules);

        $assemblyMovementInput->update($request->all());

        return redirect()->route('assembly-movement-inputs.index')
            ->with('success', 'AssemblyMovementInput updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assemblyMovementInput = AssemblyMovementInput::find($id)->delete();

        return redirect()->route('assembly-movement-inputs.index')
            ->with('success', 'AssemblyMovementInput deleted successfully');
    }
}
