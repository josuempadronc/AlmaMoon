<?php

namespace App\Http\Controllers;

use App\Models\ProgressVulcanizado;
use Illuminate\Http\Request;

/**
 * Class ProgressVulcanizadoController
 * @package App\Http\Controllers
 */
class ProgressVulcanizadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progressVulcanizados = ProgressVulcanizado::paginate();

        return view('Ensamble/progress-vulcanizado.index', compact('progressVulcanizados'))
            ->with('i', (request()->input('page', 1) - 1) * $progressVulcanizados->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progressVulcanizado = new ProgressVulcanizado();
        return view('Ensamble/progress-vulcanizado.create', compact('progressVulcanizado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProgressVulcanizado::$rules);

        $progressVulcanizado = ProgressVulcanizado::create($request->all());

        return redirect()->route('Ensamble/progress-vulcanizados.index')
            ->with('success', 'ProgressVulcanizado created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progressVulcanizado = ProgressVulcanizado::find($id);

        return view('Ensamble/progress-vulcanizado.show', compact('progressVulcanizado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progressVulcanizado = ProgressVulcanizado::find($id);

        return view('Ensamble/progress-vulcanizado.edit', compact('progressVulcanizado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProgressVulcanizado $progressVulcanizado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressVulcanizado $progressVulcanizado)
    {
        request()->validate(ProgressVulcanizado::$rules);

        $progressVulcanizado->update($request->all());

        return redirect()->route('Ensamble/progress-vulcanizados.index')
            ->with('success', 'ProgressVulcanizado updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $progressVulcanizado = ProgressVulcanizado::find($id)->delete();

        return redirect()->route('Ensamble/progress-vulcanizados.index')
            ->with('success', 'ProgressVulcanizado deleted successfully');
    }
}
