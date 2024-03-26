<?php

namespace App\Http\Controllers;

use App\Models\RawMaterial;
use Illuminate\Http\Request;

/**
 * Class RawMaterialController
 * @package App\Http\Controllers
 */
class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rawMaterials = RawMaterial::paginate();

        return view('raw-material.index', compact('rawMaterials'))
            ->with('i', (request()->input('page', 1) - 1) * $rawMaterials->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rawMaterial = new RawMaterial();
        return view('raw-material.create', compact('rawMaterial'));
    }

     /**
     * Show the form for Importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $archivo = $request->file('Matreria Prima');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $Destination = new RawMaterial();
            $Destination->name = $campos[0];
            $Destination->save();
        }

        return redirect()->route('raw-materials.index')
        ->with('success', 'Se han importado las Ubicaciones correctamente.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RawMaterial::$rules);

        $rawMaterial = RawMaterial::create($request->all());

        return redirect()->route('raw-materials.index')
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
        $rawMaterial = RawMaterial::find($id);

        return view('raw-material.show', compact('rawMaterial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rawMaterial = RawMaterial::find($id);

        return view('raw-material.edit', compact('rawMaterial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RawMaterial $rawMaterial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RawMaterial $rawMaterial)
    {
        request()->validate(RawMaterial::$rules);

        $rawMaterial->update($request->all());

        return redirect()->route('raw-materials.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rawMaterial = RawMaterial::find($id)->delete();

        return redirect()->route('raw-materials.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
