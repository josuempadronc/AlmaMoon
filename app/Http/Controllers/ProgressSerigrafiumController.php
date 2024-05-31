<?php

namespace App\Http\Controllers;

use App\Models\ProgressSerigrafium;
use Illuminate\Http\Request;

/**
 * Class ProgressSerigrafiumController
 * @package App\Http\Controllers
 */
class ProgressSerigrafiumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $progressSerigrafia = ProgressSerigrafium::paginate();

        return view('Ensamble/progress-serigrafium.index', compact('progressSerigrafia'))
            ->with('i', (request()->input('page', 1) - 1) * $progressSerigrafia->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $progressSerigrafium = new ProgressSerigrafium();
        return view('Ensamble/progress-serigrafium.create', compact('progressSerigrafium'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProgressSerigrafium::$rules);

        $progressSerigrafium = ProgressSerigrafium::create($request->all());

        return redirect()->route('progress-serigrafia.index')
            ->with('success', 'ProgressSerigrafium created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $progressSerigrafium = ProgressSerigrafium::find($id);

        return view('Ensamble/progress-serigrafium.show', compact('progressSerigrafium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $progressSerigrafium = ProgressSerigrafium::find($id);

        return view('Ensamble/progress-serigrafium.edit', compact('progressSerigrafium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProgressSerigrafium $progressSerigrafium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgressSerigrafium $progressSerigrafium)
    {
        request()->validate(ProgressSerigrafium::$rules);

        $progressSerigrafium->update($request->all());

        return redirect()->route('progress-serigrafia.index')
            ->with('success', 'ProgressSerigrafium updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $progressSerigrafium = ProgressSerigrafium::find($id)->delete();

        return redirect()->route('progress-serigrafia.index')
            ->with('success', 'ProgressSerigrafium deleted successfully');
    }
}
