<?php

namespace App\Http\Controllers;

use App\Models\Measure;
use Illuminate\Http\Request;

/**
 * Class MeasureController
 * @package App\Http\Controllers
 */
class MeasureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measures = Measure::paginate();

        return view('measure.index', compact('measures'))
            ->with('i', (request()->input('page', 1) - 1) * $measures->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $measure = new Measure();
        return view('measure.create', compact('measure'));
    }

    /**
     * Show the form for Importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $archivo = $request->file('Medidas');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $Measure = new Measure();
            $Measure->name = $campos[0];
            $Measure->save();
        }

        return redirect()->route('measures.index')
        ->with('success', 'Se han importado las Medidas correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Measure::$rules);

        $measure = Measure::create($request->all());

        return redirect()->route('measures.index')
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
        $measure = Measure::find($id);

        return view('measure.show', compact('measure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $measure = Measure::find($id);

        return view('measure.edit', compact('measure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Measure $measure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measure $measure)
    {
        request()->validate(Measure::$rules);

        $measure->update($request->all());

        return redirect()->route('measures.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $measure = Measure::find($id)->delete();

        return redirect()->route('measures.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
