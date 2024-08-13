<?php

namespace App\Http\Controllers;

use App\Models\SewingRawMaterial;
use App\Models\Color;
use Illuminate\Http\Request;

/**
 * Class SewingRawMaterialController
 * @package App\Http\Controllers
 */
class SewingRawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sewingRawMaterials = SewingRawMaterial::paginate();

        return view('Costura/sewing-raw-material.index', compact('sewingRawMaterials'))
            ->with('i', (request()->input('page', 1) - 1) * $sewingRawMaterials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sewingRawMaterial = new SewingRawMaterial();
        $color = Color::pluck('name', 'id');
        return view(
            'Costura/sewing-raw-material.create',
            compact(
                'sewingRawMaterial',
                'color',
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
        request()->validate(SewingRawMaterial::$rules);

        $sewingRawMaterial = SewingRawMaterial::create($request->all());

        return redirect()->route('sewing-raw-materials.index')
            ->with('success', 'SewingRawMaterial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sewingRawMaterial = SewingRawMaterial::find($id);

        return view('Costura/sewing-raw-material.show', compact('sewingRawMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sewingRawMaterial = SewingRawMaterial::find($id);
        $color = Color::pluck('name', 'id');
        return view(
            'Costura/sewing-raw-material.edit',
            compact(
                'sewingRawMaterial',
                'color',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SewingRawMaterial $sewingRawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SewingRawMaterial $sewingRawMaterial)
    {
        request()->validate(SewingRawMaterial::$rules);

        $sewingRawMaterial->update($request->all());

        return redirect()->route('sewing-raw-materials.index')
            ->with('success', 'SewingRawMaterial updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $sewingRawMaterial = SewingRawMaterial::find($id)->delete();

        return redirect()->route('sewing-raw-materials.index')
            ->with('success', 'SewingRawMaterial deleted successfully');
    }
}
