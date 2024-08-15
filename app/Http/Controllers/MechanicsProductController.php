<?php

namespace App\Http\Controllers;

use App\Models\MechanicsProduct;
use Illuminate\Http\Request;

/**
 * Class MechanicsProductController
 * @package App\Http\Controllers
 */
class MechanicsProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanicsProducts = MechanicsProduct::paginate();

        return view('MetalMecanica/mechanics-product.index', compact('mechanicsProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $mechanicsProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanicsProduct = new MechanicsProduct();
        return view('MetalMecanica/mechanics-product.create', compact('mechanicsProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MechanicsProduct::$rules);

        $mechanicsProduct = MechanicsProduct::create($request->all());

        return redirect()->route('mechanics-products.index')
            ->with('success', 'MechanicsProduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mechanicsProduct = MechanicsProduct::find($id);

        return view('MetalMecanica/mechanics-product.show', compact('mechanicsProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanicsProduct = MechanicsProduct::find($id);

        return view('MetalMecanica/mechanics-product.edit', compact('mechanicsProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MechanicsProduct $mechanicsProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MechanicsProduct $mechanicsProduct)
    {
        request()->validate(MechanicsProduct::$rules);

        $mechanicsProduct->update($request->all());

        return redirect()->route('mechanics-products.index')
            ->with('success', 'MechanicsProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mechanicsProduct = MechanicsProduct::find($id)->delete();

        return redirect()->route('mechanics-products.index')
            ->with('success', 'MechanicsProduct deleted successfully');
    }
}
