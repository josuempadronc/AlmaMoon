<?php

namespace App\Http\Controllers;

use App\Models\Paw;
use Illuminate\Http\Request;

/**
 * Class PawController
 * @package App\Http\Controllers
 */
class PawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paws = Paw::paginate();

        return view('paw.index', compact('paws'))
            ->with('i', (request()->input('page', 1) - 1) * $paws->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paw = new Paw();
        return view('paw.create', compact('paw'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Paw::$rules);

        $paw = Paw::create($request->all());

        return redirect()->route('paws.index')
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
        $paw = Paw::find($id);

        return view('paw.show', compact('paw'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paw = Paw::find($id);

        return view('paw.edit', compact('paw'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Paw $paw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paw $paw)
    {
        request()->validate(Paw::$rules);

        $paw->update($request->all());

        return redirect()->route('paws.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $paw = Paw::find($id)->delete();

        return redirect()->route('paws.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
