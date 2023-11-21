<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\AssembledProduct;
use App\Models\Destination;
use App\Models\FinishedProduct;
use App\Models\MovementDetail;
use Illuminate\Http\Request;

/**
 * Class OrderController
 * @package App\Http\Controllers
 */
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate();

        return view('order.index', compact('orders'))
            ->with('i', (request()->input('page', 1) - 1) * $orders->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        $movementDetail = MovementDetail::pluck('name','id');
        $FinishedProduct = FinishedProduct::pluck('name','id');
        $AssembledProduct = AssembledProduct::pluck('name','id');
        $Destination = Destination::pluck('name','id');
        return view('order.create', compact(
            'order',
            'movementDetail',
            'FinishedProduct',
            'AssembledProduct',
            'Destination'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Order::$rules);

        $order = Order::create($request->all());

        return redirect()->route('orders.index')
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
        $order = Order::find($id);

        return view('order.show',compact(
            'order',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        $movementDetail = MovementDetail::pluck('name','id');
        $FinishedProduct = FinishedProduct::pluck('name','id');
        $AssembledProduct = AssembledProduct::pluck('name','id');
        $Destination = Destination::pluck('name','id');

        return view('order.edit', compact(
            'order',
            'movementDetail',
            'FinishedProduct',
            'AssembledProduct',
            'Destination'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        request()->validate(Order::$rules);

        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id)->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
