<?php

namespace App\Http\Controllers;

use App\Models\InyecionRawMaterial;
use Illuminate\Http\Request;

/**
 * Class InyecionRawMaterialController
 * @package App\Http\Controllers
 */
class InyecionRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inyecionRawMaterials = InyecionRawMaterial::paginate();

        return view('Inyeccion/inyecion-raw-material.index', compact('inyecionRawMaterials'))
            ->with('i', (request()->input('page', 1) - 1) * $inyecionRawMaterials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inyecionRawMaterial = new InyecionRawMaterial();
        return view('Inyeccion/inyecion-raw-material.create', compact('inyecionRawMaterial'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(InyecionRawMaterial::$rules);

        $inyecionRawMaterial = InyecionRawMaterial::create($request->all());

        return redirect()->route('inyecion-raw-materials.index')
            ->with('success', 'InyecionRawMaterial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inyecionRawMaterial = InyecionRawMaterial::find($id);

        return view('Inyeccion/inyecion-raw-material.show', compact('inyecionRawMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inyecionRawMaterial = InyecionRawMaterial::find($id);

        return view('Inyeccion/inyecion-raw-material.edit', compact('inyecionRawMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InyecionRawMaterial $inyecionRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InyecionRawMaterial $inyecionRawMaterial)
    {
        request()->validate(InyecionRawMaterial::$rules);

        $inyecionRawMaterial->update($request->all());

        return redirect()->route('inyecion-raw-materials.index')
            ->with('success', 'InyecionRawMaterial updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inyecionRawMaterial = InyecionRawMaterial::find($id)->delete();

        return redirect()->route('inyecion-raw-materials.index')
            ->with('success', 'InyecionRawMaterial deleted successfully');
    }
}
