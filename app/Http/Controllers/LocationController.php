<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

/**
 * Class LocationController
 * @package App\Http\Controllers
 */
class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::paginate();

        return view('location.index', compact('locations'))
            ->with('i', (request()->input('page', 1) - 1) * $locations->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $location = new Location();
        return view('location.create', compact('location'));
    }

    /**
     * Show the form for Importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function import(Request $request)
     {
         $archivo = $request->file('Ubicaciones');
         $contenido = file($archivo->getRealPath());

         // Empezamos desde la segunda línea para omitir el encabezado
         for ($i = 1; $i < count($contenido); $i++) {
             $linea = trim($contenido[$i]);
             $campos = explode(',', $linea);

             $Destination = new Location();
             $Destination->name = $campos[0];
             $Destination->save();
         }

         return redirect()->route('locations.index')
         ->with('success', 'Se han importado las Ubicaciones correctamente.');
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Location::$rules);

        $location = Location::create($request->all());

        return redirect()->route('locations.index')
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
        $location = Location::find($id);

        return view('location.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::find($id);

        return view('location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        request()->validate(Location::$rules);

        $location->update($request->all());

        return redirect()->route('locations.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $location = Location::find($id)->delete();

        return redirect()->route('locations.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
