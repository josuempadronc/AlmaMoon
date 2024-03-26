<?php

namespace App\Http\Controllers;

use App\Models\SemiFinishedProduct;
use App\Models\Color;
use Illuminate\Http\Request;
use function Laravel\Prompts\alert;


/**
 * Class SemiFinishedProductController
 * @package App\Http\Controllers
 */
class SemiFinishedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semiFinishedProducts = SemiFinishedProduct::paginate();

        return view(
            'semi-finished-product.index',
            compact('semiFinishedProducts')
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $semiFinishedProduct = new SemiFinishedProduct();
        $colors = Color::pluck('name', 'id');
        return view(
            'semi-finished-product.create',
            compact('semiFinishedProduct', 'colors')
        );
    }

    /**
     * Show the form for importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {

        $archivo = $request->file('SemiTerminado');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $finishedProduct = new SemiFinishedProduct();
            $finishedProduct->name = $campos[0];

            // Buscar el modelo Color por nombre
            $color = Color::where('name', $campos[1])->first();
            // dd($campos[1]);

            if ($color) {
                $finishedProduct->color_id = $color->id;
            } else {
                alert("El color '$campos[1]' no existe en la base de datos.");
            }
            // dd($color);

            // // Buscar el modelo Paw por nombre
            // $paw = Paw::where('name', $campos[2])->first();

            // if ($paw) {
            //     // $finishedProduct->paw_id = $paw;
            //     $finishedProduct->paw_id = $paw->id;
            // } else {
            //     // $finishedProduct->paw_id = 0;
            //     alert("La pata '$campos[2]' no existe en la base de datos.");
            // }

            $finishedProduct->stock = $campos[2];

            $finishedProduct->save();
        }
        return redirect()->route('semi-finished-products.index')
            ->with('success', 'Se han importado los Productos SemiTerminados correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(SemiFinishedProduct::$rules);

        $semiFinishedProduct = SemiFinishedProduct::create($request->all());

        return redirect()->route('semi-finished-products.index')
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
        $semiFinishedProduct = SemiFinishedProduct::find($id);

        return view(
            'semi-finished-product.show',
            compact('semiFinishedProduct')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semiFinishedProduct = SemiFinishedProduct::find($id);
        $colors = Color::pluck('name', 'id');
        return view(
            'semi-finished-product.edit',
            compact('semiFinishedProduct', 'colors')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  SemiFinishedProduct $semiFinishedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SemiFinishedProduct $semiFinishedProduct)
    {
        request()->validate(SemiFinishedProduct::$rules);

        $semiFinishedProduct->update($request->all());

        return redirect()->route('semi-finished-products.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $semiFinishedProduct = SemiFinishedProduct::find($id)->delete();

        return redirect()->route('semi-finished-products.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
