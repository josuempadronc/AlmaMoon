<?php

namespace App\Http\Controllers;

use App\Models\ProductSheat;
use Illuminate\Http\Request;

/**
 * Class ProductSheatController
 * @package App\Http\Controllers
 */
class ProductSheatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productSheats = ProductSheat::paginate();

        return view('Ensamble/product-sheat.index', compact('productSheats'))
            ->with('i', (request()->input('page', 1) - 1) * $productSheats->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productSheat = new ProductSheat();
        return view('Ensamble/product-sheat.create', compact('productSheat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductSheat::$rules);

        $productSheat = ProductSheat::create($request->all());

        return redirect()->route('product-sheats.index')
            ->with('success', 'ProductSheat created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productSheat = ProductSheat::find($id);

        return view('Ensamble/product-sheat.show', compact('productSheat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productSheat = ProductSheat::find($id);

        return view('Ensamble/product-sheat.edit', compact('productSheat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductSheat $productSheat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductSheat $productSheat)
    {
        request()->validate(ProductSheat::$rules);

        $productSheat->update($request->all());

        return redirect()->route('product-sheats.index')
            ->with('success', 'ProductSheat updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productSheat = ProductSheat::find($id)->delete();

        return redirect()->route('product-sheats.index')
            ->with('success', 'ProductSheat deleted successfully');
    }
}
