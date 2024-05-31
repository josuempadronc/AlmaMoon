<?php

namespace App\Http\Controllers;

use App\Models\ProgressLona;
use Illuminate\Http\Request;

/**
 * Class ProgressLonaController
 * @package App\Http\Controllers
 */
class ProgressLonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progressLonas = ProgressLona::paginate();

        return view('Ensamble/progress-lona.index', compact('progressLonas'))
            ->with('i', (request()->input('page', 1) - 1) * $progressLonas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progressLona = new ProgressLona();
        return view('Ensamble/progress-lona.create', compact('progressLona'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProgressLona::$rules);

        $progressLona = ProgressLona::create($request->all());

        return redirect()->route('Ensamble/progress-lonas.index')
            ->with('success', 'ProgressLona created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progressLona = ProgressLona::find($id);

        return view('Ensamble/progress-lona.show', compact('progressLona'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progressLona = ProgressLona::find($id);

        return view('Ensamble/progress-lona.edit', compact('progressLona'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProgressLona $progressLona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressLona $progressLona)
    {
        request()->validate(ProgressLona::$rules);

        $progressLona->update($request->all());

        return redirect()->route('Ensamble/progress-lonas.index')
            ->with('success', 'ProgressLona updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $progressLona = ProgressLona::find($id)->delete();

        return redirect()->route('Ensamble/progress-lonas.index')
            ->with('success', 'ProgressLona deleted successfully');
    }
}
