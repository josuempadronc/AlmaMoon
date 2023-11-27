<?php

namespace App\Http\Controllers;

use App\Models\OrderFinishedProduct;
use Illuminate\Http\Request;

/**
 * Class OrderFinishedProductController
 * @package App\Http\Controllers
 */
class OrderFinishedProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderFinishedProducts = OrderFinishedProduct::paginate();

        return view('order-finished-product.index', compact('orderFinishedProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $orderFinishedProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orderFinishedProduct = new OrderFinishedProduct();
        return view('order-finished-product.create', compact('orderFinishedProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(OrderFinishedProduct::$rules);

        $orderFinishedProduct = OrderFinishedProduct::create($request->all());

        return redirect()->route('order-finished-products.index')
            ->with('success', 'OrderFinishedProduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderFinishedProduct = OrderFinishedProduct::find($id);

        return view('order-finished-product.show', compact('orderFinishedProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderFinishedProduct = OrderFinishedProduct::find($id);

        return view('order-finished-product.edit', compact('orderFinishedProduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  OrderFinishedProduct $orderFinishedProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderFinishedProduct $orderFinishedProduct)
    {
        request()->validate(OrderFinishedProduct::$rules);

        $orderFinishedProduct->update($request->all());

        return redirect()->route('order-finished-products.index')
            ->with('success', 'OrderFinishedProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $orderFinishedProduct = OrderFinishedProduct::find($id)->delete();

        return redirect()->route('order-finished-products.index')
            ->with('success', 'OrderFinishedProduct deleted successfully');
    }
}
