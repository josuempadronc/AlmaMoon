<?php

namespace App\Http\Controllers;

use App\Models\SemiFinishedProduct;
use App\Models\Color;
use Illuminate\Http\Request;

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

        return view('semi-finished-product.index', compact('semiFinishedProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $semiFinishedProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $semiFinishedProduct = new SemiFinishedProduct();
        $colors = Color::pluck('name','id');
        return view('semi-finished-product.create', compact('semiFinishedProduct', 'colors'));
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

        return view('semi-finished-product.show', compact('semiFinishedProduct'));
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
        $colors = Color::pluck('name','id');
        return view('semi-finished-product.edit', compact('semiFinishedProduct', 'colors'));
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
