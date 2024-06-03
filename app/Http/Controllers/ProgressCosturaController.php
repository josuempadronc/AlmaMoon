<?php

namespace App\Http\Controllers;

use App\Models\ProgressCostura;
use Illuminate\Http\Request;

/**
 * Class ProgressCosturaController
 * @package App\Http\Controllers
 */
class ProgressCosturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progressCosturas = ProgressCostura::paginate();

        return view('Ensamble/progress-costura.index', compact('progressCosturas'))
            ->with('i', (request()->input('page', 1) - 1) * $progressCosturas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progressCostura = new ProgressCostura();
        return view('Ensamble/progress-costura.create', compact('progressCostura'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProgressCostura::$rules);

        $progressCostura = ProgressCostura::create($request->all());

        return redirect()->route('progress-costura.index')
            ->with('success', 'Progreso Creado.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progressCostura = ProgressCostura::find($id);

        return view('Ensamble/progress-costura.show', compact('progressCostura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progressCostura = ProgressCostura::find($id);

        return view('Ensamble/progress-costura.edit', compact('progressCostura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProgressCostura $progressCostura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressCostura $progressCostura)
    {
        request()->validate(ProgressCostura::$rules);

        $progressCostura->update($request->all());

        return redirect()->route('progress-costura.index')
            ->with('success', 'Progreso Actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $progressCostura = ProgressCostura::find($id)->delete();

        return redirect()->route('progress-costura.index')
            ->with('success', 'Progreso Eliminado');
    }
}
