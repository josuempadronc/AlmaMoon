<?php

namespace App\Http\Controllers;

use App\Models\AssemblyStructure;
use App\Models\AssemblyInput;
use App\Models\AssemblyAccessory;
use Illuminate\Http\Request;

/**
 * Class AssemblyStructureController
 * @package App\Http\Controllers
 */
class AssemblyStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemblyStructures = AssemblyStructure::paginate();

        return view('Ensamble/assembly-structure.index', compact('assemblyStructures'))
            ->with('i', (request()->input('page', 1) - 1) * $assemblyStructures->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assemblyStructure = new AssemblyStructure();
        $input = AssemblyInput::pluck('id','name','color_id');
        $accessory = AssemblyAccessory::pluck('id','name');
        return view('Ensamble/assembly-structure.create',
        compact(
            'assemblyStructure',
            'input',
            'accessory',
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
        request()->validate(AssemblyStructure::$rules);

        $assemblyStructure = AssemblyStructure::create($request->all());

        return redirect()->route('assembly-structures.index')
            ->with('success', 'AssemblyStructure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assemblyStructure = AssemblyStructure::find($id);

        return view('Ensamble/assembly-structure.show', compact('assemblyStructure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assemblyStructure = AssemblyStructure::find($id);

        return view('Ensamble/assembly-structure.edit', compact('assemblyStructure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AssemblyStructure $assemblyStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssemblyStructure $assemblyStructure)
    {
        request()->validate(AssemblyStructure::$rules);

        $assemblyStructure->update($request->all());

        return redirect()->route('assembly-structures.index')
            ->with('success', 'AssemblyStructure updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assemblyStructure = AssemblyStructure::find($id)->delete();

        return redirect()->route('assembly-structures.index')
            ->with('success', 'AssemblyStructure deleted successfully');
    }
}
