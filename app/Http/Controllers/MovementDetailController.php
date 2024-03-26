<?php

namespace App\Http\Controllers;

use App\Models\MovementDetail;
use Illuminate\Http\Request;

/**
 * Class MovementDetailController
 * @package App\Http\Controllers
 */
class MovementDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movementDetails = MovementDetail::paginate();

        return view('movement-detail.index', compact('movementDetails'))
            ->with('i', (request()->input('page', 1) - 1) * $movementDetails->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movementDetail = new MovementDetail();
        return view('movement-detail.create', compact('movementDetail'));
    }

    /**
     * Show the form for Importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $archivo = $request->file('DetallesMoviminetos');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $MovementDetail = new MovementDetail();
            $MovementDetail->name = $campos[0];
            $MovementDetail->save();
        }

        return redirect()->route('movement-details.index')
        ->with('success', 'Se han importado los Detalles de Movimineto correctamente.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MovementDetail::$rules);

        $movementDetail = MovementDetail::create($request->all());

        return redirect()->route('movement-details.index')
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
        $movementDetail = MovementDetail::find($id);

        return view('movement-detail.show', compact('movementDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movementDetail = MovementDetail::find($id);

        return view('movement-detail.edit', compact('movementDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MovementDetail $movementDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovementDetail $movementDetail)
    {
        request()->validate(MovementDetail::$rules);

        $movementDetail->update($request->all());

        return redirect()->route('movement-details.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $movementDetail = MovementDetail::find($id)->delete();

        return redirect()->route('movement-details.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
