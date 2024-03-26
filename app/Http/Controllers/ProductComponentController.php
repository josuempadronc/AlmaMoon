<?php

namespace App\Http\Controllers;

use App\Models\ProductComponent;
use Illuminate\Http\Request;

/**
 * Class ProductComponentController
 * @package App\Http\Controllers
 */
class ProductComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productComponents = ProductComponent::paginate();

        return view('product-component.index', compact('productComponents'))
            ->with('i', (request()->input('page', 1) - 1) * $productComponents->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productComponent = new ProductComponent();
        return view('product-component.create', compact('productComponent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductComponent::$rules);

        $productComponent = ProductComponent::create($request->all());

        return redirect()->route('product-components.index')
            ->with('success', 'ProductComponent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productComponent = ProductComponent::find($id);

        return view('product-component.show', compact('productComponent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productComponent = ProductComponent::find($id);

        return view('product-component.edit', compact('productComponent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductComponent $productComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductComponent $productComponent)
    {
        request()->validate(ProductComponent::$rules);

        $productComponent->update($request->all());

        return redirect()->route('product-components.index')
            ->with('success', 'ProductComponent updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productComponent = ProductComponent::find($id)->delete();

        return redirect()->route('product-components.index')
            ->with('success', 'ProductComponent deleted successfully');
    }
}
