<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

/**
 * Class ColorController
 * @package App\Http\Controllers
 */
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::paginate();

        return view('color.index', compact('colors'))
            ->with('i', (request()->input('page', 1) - 1) * $colors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $color = new Color();
        return view('color.create', compact('color'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Color::$rules);

        $color = Color::create($request->all());

        return redirect()->route('color.index')
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
        $color = Color::find($id);

        return view('color.show', compact('color'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color = Color::find($id);

        return view('color.edit', compact('color'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Color $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Color $color)
    {
        request()->validate(Color::$rules);

        $color->update($request->all());

        return redirect()->route('color.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $color = Color::find($id)->delete();

        return redirect()->route('color.index')
            ->with('success', 'Informacion eliminado con exito');
    }
}
