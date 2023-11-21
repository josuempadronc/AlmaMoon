<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

/**
 * Class DestinationController
 * @package App\Http\Controllers
 */
class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $destinations = Destination::paginate();

        return view('destination.index', compact('destinations'))
            ->with('i', (request()->input('page', 1) - 1) * $destinations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $destination = new Destination();
        return view('destination.create', compact('destination'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Destination::$rules);

        $destination = Destination::create($request->all());

        return redirect()->route('destinations.index')
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
        $destination = Destination::find($id);

        return view('destination.show', compact('destination'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destination = Destination::find($id);

        return view('destination.edit', compact('destination'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Destination $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Destination $destination)
    {
        request()->validate(Destination::$rules);

        $destination->update($request->all());

        return redirect()->route('destinations.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $destination = Destination::find($id)->delete();

        return redirect()->route('destinations.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
