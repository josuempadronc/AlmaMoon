<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

/**
 * Class ColorController
 * @package App\Http\Controllers
 */
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();

        return view('color.index', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color = new Color();
        return view('color.create', compact('color'));
    }
     /**
     * Show the form for Importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function import(Request $request)
    {
        $archivo = $request->file('Colores');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $Color = new Color();
            $Color->name = $campos[0];
            $Color->save();
        }

        return redirect()->route('color.index')
        ->with('success', 'Se han importado los Colores correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Color::$rules);

        $color = Color::create($request->all());

        return redirect()->route('color.index')
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
        $color = Color::find($id);

        return view('color.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);

        return view('color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Color $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        request()->validate(Color::$rules);

        $color->update($request->all());

        return redirect()->route('color.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $color = Color::find($id)->delete();

        return redirect()->route('color.index')
            ->with('success', 'Informacion eliminado con exito');
    }
}
