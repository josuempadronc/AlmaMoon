<?php

namespace App\Http\Controllers;

use App\Models\FinishedProduct;
use App\Models\Color;
use App\Models\Paw;
use Illuminate\Http\Request;

use function Laravel\Prompts\alert;
use App\Http\Controllers\Exception;

/**
 * Class FinishedProductController
 * @package App\Http\Controllers
 */
class FinishedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $finishedProducts = FinishedProduct::paginate();

        return view(
            'finished-product.index',
            compact('finishedProducts')
        )
            ->with('i', (request()
                ->input('page', 1) - 1) * $finishedProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $finishedProduct = new FinishedProduct();
        $colors = Color::pluck('name', 'id');
        $paws = Paw::pluck('name', 'id');

        return view(
            'finished-product.create',
            compact('finishedProduct', 'colors', 'paws')
        );
    }

    /**
     * Show the form for importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {

        $archivo = $request->file('Productos');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $finishedProduct = new FinishedProduct();
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

            // Buscar el modelo Paw por nombre
            $paw = Paw::where('name', $campos[2])->first();

            if ($paw) {
                // $finishedProduct->paw_id = $paw;
                $finishedProduct->paw_id = $paw->id;
            } else {
                // $finishedProduct->paw_id = 0;
                alert("La pata '$campos[2]' no existe en la base de datos.");
            }

            $finishedProduct->stock = $campos[3];

            $finishedProduct->save();
        }
        return redirect()->route('finished-products.index')
            ->with('success', 'Se han importado los productos correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(FinishedProduct::$rules);

        $finishedProduct = FinishedProduct::create($request->all());

        return redirect()->route('finished-products.index')
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
        $finishedProduct = FinishedProduct::find($id);

        return view('finished-product.show', compact('finishedProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $finishedProduct = FinishedProduct::find($id);
        $colors = Color::pluck('name', 'id');
        $paws = Paw::pluck('name', 'id');

        return view('finished-product.edit', compact('finishedProduct', 'colors', 'paws'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  FinishedProduct $finishedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinishedProduct $finishedProduct)
    {
        request()->validate(FinishedProduct::$rules);

        $finishedProduct->update($request->all());

        return redirect()->route('finished-products.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $finishedProduct = FinishedProduct::find($id)->delete();

        return redirect()->route('finished-products.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
