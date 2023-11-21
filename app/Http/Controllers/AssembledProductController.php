<?php

namespace App\Http\Controllers;

use App\Models\AssembledProduct;
use App\Models\SemiFinishedProduct;
use Illuminate\Http\Request;

/**
 * Class AssembledProductController
 * @package App\Http\Controllers
 */
class AssembledProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assembledProducts = AssembledProduct::paginate();

        return view('assembled-product.index', compact('assembledProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $assembledProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assembledProduct = new AssembledProduct();
        $semiFinishedProduct = SemiFinishedProduct::pluck('name', 'id');

        return view('assembled-product.create', compact('assembledProduct', 'semiFinishedProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AssembledProduct::$rules);

        $assembledProduct = AssembledProduct::create($request->all());

        return redirect()->route('assembled-products.index')
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
        $assembledProduct = AssembledProduct::find($id);

        return view('assembled-product.show', compact('assembledProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $assembledProduct = AssembledProduct::find($id);
        $semiFinishedProduct = SemiFinishedProduct::pluck('name', 'id');

        return view('assembled-product.edit', compact('assembledProduct', 'semiFinishedProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AssembledProduct $assembledProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssembledProduct $assembledProduct)
    {
        request()->validate(AssembledProduct::$rules);

        $assembledProduct->update($request->all());

        return redirect()->route('assembled-products.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assembledProduct = AssembledProduct::find($id)->delete();

        return redirect()->route('assembled-products.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
