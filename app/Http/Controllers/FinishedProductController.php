<?php

namespace App\Http\Controllers;

use App\Models\FinishedProduct;
use App\Models\Color;
use App\Models\Paw;
use Illuminate\Http\Request;

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

        return view('finished-product.index',
            compact('finishedProducts'))
            ->with('i', (request()
            ->input('page', 1) - 1) * $finishedProducts->
            perPage());


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $finishedProduct = new FinishedProduct();
        $colors = Color::pluck('name','id');
        $paws = Paw::pluck('name','id');

        return view('finished-product.create', compact('finishedProduct', 'colors', 'paws'));
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
        $colors = Color::pluck('name','id');
        $paws = Paw::pluck('name','id');

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
