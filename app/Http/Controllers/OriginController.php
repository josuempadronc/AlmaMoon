<?php

namespace App\Http\Controllers;

use App\Models\Origin;
use Illuminate\Http\Request;

/**
 * Class OriginController
 * @package App\Http\Controllers
 */
class OriginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $origins = Origin::paginate();

        return view('origin.index', compact('origins'))
            ->with('i', (request()->input('page', 1) - 1) * $origins->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $origin = new Origin();
        return view('origin.create', compact('origin'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Origin::$rules);

        $origin = Origin::create($request->all());

        return redirect()->route('origins.index')
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
        $origin = Origin::find($id);

        return view('origin.show', compact('origin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $origin = Origin::find($id);

        return view('origin.edit', compact('origin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Origin $origin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Origin $origin)
    {
        request()->validate(Origin::$rules);

        $origin->update($request->all());

        return redirect()->route('origins.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $origin = Origin::find($id)->delete();

        return redirect()->route('origins.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
