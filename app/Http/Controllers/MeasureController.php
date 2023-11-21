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
