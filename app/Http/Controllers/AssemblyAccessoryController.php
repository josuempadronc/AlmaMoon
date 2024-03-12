<?php

namespace App\Http\Controllers;

use App\Models\AssemblyAccessory;
use Illuminate\Http\Request;

/**
 * Class AssemblyAccessoryController
 * @package App\Http\Controllers
 */
class AssemblyAccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemblyAccessories = AssemblyAccessory::paginate();

        return view('Ensamble/assembly-accessory.index', compact('assemblyAccessories'))
            ->with('i', (request()->input('page', 1) - 1) * $assemblyAccessories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assemblyAccessory = new AssemblyAccessory();
        return view('Ensamble/assembly-accessory.create', compact('assemblyAccessory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AssemblyAccessory::$rules);

        $assemblyAccessory = AssemblyAccessory::create($request->all());

        return redirect()->route('assembly-accessories.index')
            ->with('success', 'AssemblyAccessory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assemblyAccessory = AssemblyAccessory::find($id);

        return view('Ensamble/assembly-accessory.show', compact('assemblyAccessory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assemblyAccessory = AssemblyAccessory::find($id);

        return view('Ensamble/assembly-accessory.edit', compact('assemblyAccessory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AssemblyAccessory $assemblyAccessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssemblyAccessory $assemblyAccessory)
    {
        request()->validate(AssemblyAccessory::$rules);

        $assemblyAccessory->update($request->all());

        return redirect()->route('assembly-accessories.index')
            ->with('success', 'AssemblyAccessory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assemblyAccessory = AssemblyAccessory::find($id)->delete();

        return redirect()->route('assembly-accessories.index')
            ->with('success', 'AssemblyAccessory deleted successfully');
    }
}
