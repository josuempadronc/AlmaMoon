<?php

namespace App\Http\Controllers;

use App\Models\ProgressAssambly;
use Illuminate\Http\Request;

/**
 * Class ProgressAssamblyController
 * @package App\Http\Controllers
 */
class ProgressAssamblyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progressAssamblies = ProgressAssambly::paginate();

        return view('Ensamble/progress-assambly.index', compact('progressAssamblies'))
            ->with('i', (request()->input('page', 1) - 1) * $progressAssamblies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progressAssambly = new ProgressAssambly();
        return view('Ensamble/progress-assambly.create', compact('progressAssambly'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProgressAssambly::$rules);

        $progressAssambly = ProgressAssambly::create($request->all());

        return redirect()->route('progress-assambly.index')
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
        $progressAssambly = ProgressAssambly::find($id);

        return view('Ensamble/progress-assambly.show', compact('progressAssambly'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progressAssambly = ProgressAssambly::find($id);

        return view('Ensamble/progress-assambly.edit', compact('progressAssambly'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProgressAssambly $progressAssambly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressAssambly $progressAssambly)
    {
        request()->validate(ProgressAssambly::$rules);

        $progressAssambly->update($request->all());

        return redirect()->route('progress-assambly .index')
            ->with('success', 'Progreso Actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $progressAssambly = ProgressAssambly::find($id)->delete();

        return redirect()->route('progress-assambly .index')
            ->with('success', 'Progreso Eliminado');
    }
}
