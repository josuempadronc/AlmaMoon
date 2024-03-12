<?php

namespace App\Http\Controllers;

// use App\Models\AssemblyInput;
use Illuminate\Http\Request;
use App\Models\AssemblyInput;

/**
 * Class AssemblyInputController
 * @package App\Http\Controllers
 */
class AssemblyInputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemblyInputs = AssemblyInput::paginate();

        return view('Ensamble/assembly-input.index', compact('assemblyInputs'))
            ->with('i', (request()->input('page', 1) - 1) * $assemblyInputs->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assemblyInput = new AssemblyInput();
        return view('Ensamble/assembly-input.create', compact('assemblyInput'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AssemblyInput::$rules);

        $assemblyInput = AssemblyInput::create($request->all());

        return redirect()->route('assembly-inputs.index')
            ->with('success', 'AssemblyInput created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assemblyInput = AssemblyInput::find($id);

        return view('Ensamble/assembly-input.show', compact('assemblyInput'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assemblyInput = AssemblyInput::find($id);

        return view('Ensamble/assembly-input.edit', compact('assemblyInput'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AssemblyInput $assemblyInput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssemblyInput $assemblyInput)
    {
        request()->validate(AssemblyInput::$rules);

        $assemblyInput->update($request->all());

        return redirect()->route('assembly-inputs.index')
            ->with('success', 'AssemblyInput updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assemblyInput = AssemblyInput::find($id)->delete();

        return redirect()->route('assembly-inputs.index')
            ->with('success', 'AssemblyInput deleted successfully');
    }
}
