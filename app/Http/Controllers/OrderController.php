<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Color;
use App\Models\AssembledProduct;
use App\Models\Customer;
use App\Models\Destination;
use App\Models\FinishedProduct;
use App\Models\MovementDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Carbon\Carbon;

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
        $orders = Order::with('finishedProducts')->get();
        // $customers = Customer::all();

        // dd($orders);
        return view('order.index', [
            'orders' => $orders,
            // 'customers' => $customers,
        ]);
    }

    public function pdf($id)
    {
        $order = Order::find($id);
        $date = Carbon::today();
        $dateFormat = $date->format('d - M - Y');
        $orderFinishedProducts = $order->finishedProducts;

        $pdf = Pdf::loadView(
            'order.pdf',
            compact(
                'order',
                'dateFormat',
                'orderFinishedProducts',
            )
        );
        return $pdf->stream();
    }

    public function actualizar($id)
    {
        // Validar los datos del formulario si es necesario

        $order = Order::find($id);

        if (!$order) {
            // Manejar el caso si la order no existe
            return redirect()
                ->back()
                ->with('error', 'La orden no existe.');
        }

        $order->status = 'Despachado';
        $order->save();

        return redirect()
            ->back()
            ->with(
                'success',
                'Estado de la orden actualizado correctamente.'
            );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $order = new Order();
        $movementDetail = MovementDetail::pluck('name', 'id');
        $FinishedProduct = FinishedProduct::pluck('name', 'id');
        $Color = Color::pluck('name', 'id');
        $AssembledProduct = AssembledProduct::pluck('name', 'id');
        $Destination = Destination::pluck('name', 'id');
        $Customer = Customer::pluck('name', 'id');

        return view('order.create', compact(
            'order',
            'movementDetail',
            'FinishedProduct',
            'AssembledProduct',
            'Destination',
            'Color',
            'Customer',
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
        // Define las reglas de validación
        $rules = [
            'name_id' => 'required',
            'rif' => 'required',
            'destination' => 'required',
            'movementDeatil_id' => 'required',
            'finishedProduct_id' => 'required|array',
            'finishedProduct_id.*' => 'exists:finished_products,id',
            'color' => 'required|array|min:1',
            'color.*' => 'required',
            'amount' => 'required|array',
            'amount.*' => 'numeric',
            'status' => 'required',
        ];

        // Valida los datos del formulario
        $validatedData = $request->validate($rules);

        // Crea un nuevo pedido
        $order = new Order();
        $order->name_id = $validatedData['name_id'];
        $order->rif = $validatedData['rif'];
        $order->destination = $validatedData['destination'];
        $order->movementDeatil_id = $validatedData['movementDeatil_id'];
        $order->status = $validatedData['status'];
        $order->save();

        // Obtén los productos finales y las cantidades del formulario
        $finishedProductIds = $validatedData['finishedProduct_id'];
        $colors = $validatedData['color'];
        $amounts = $validatedData['amount'];

        // Asocia los productos finales al pedido con sus respectivas cantidades
        foreach ($finishedProductIds as $index => $finishedProductId) {
            $order->finishedProducts()->attach([$finishedProductId => [
                'amount' => $amounts[$index],
                'color_id' => $colors[$index]
            ]]);
        }

        return redirect()->route('orders.index')
            ->with('success', 'Información guardada con éxito');
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
        $Color = Color::pluck('name', 'id');
        $orderFinishedProducts = $order->finishedProducts;

        // dd($orderFinishedProducts, $order);
        return view('order.show', compact(
            'order',
            'orderFinishedProducts',
            'Color'
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
        $movementDetail = MovementDetail::pluck('name', 'id');
        $FinishedProduct = FinishedProduct::pluck('name', 'id');
        $AssembledProduct = AssembledProduct::pluck('name', 'id');
        $Destination = Destination::pluck('name', 'id');
        $Color = Color::pluck('name', 'id');
        $order = Order::with('finishedProducts')->find($id);
        $Customer = Customer::pluck('name', 'id');
        $orderFinishedProducts = $order->finishedProducts;

        return view('order.edit', compact(
            'order',
            'movementDetail',
            'FinishedProduct',
            'AssembledProduct',
            'Destination',
            'Color',
            'orderFinishedProducts',
            'Customer'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Order $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Define las reglas de validación
        $rules = [
            'name_id' => 'required',
            'rif' => 'required',
            'destination' => 'required',
            'movementDeatil_id' => 'required',
            'finishedProduct_id' => 'required|array',
            'finishedProduct_id.*' => 'exists:finished_products,id',
            'color_id' => 'required|array|min:1',
            'color_id.*' => 'required',
            'amount' => 'required|array',
            'amount.*' => 'numeric',
            'status' => 'required',
        ];

        // Valida los datos del formulario
        $validatedData = $request->validate($rules);

        // Encuentra el pedido a editar
        $order = Order::find($id);
        $order->name_id = $validatedData['name_id'];
        $order->rif = $validatedData['rif'];
        $order->destination = $validatedData['destination'];
        $order->movementDeatil_id = $validatedData['movementDeatil_id'];
        $order->status = $validatedData['status'];
        $order->save();

        // Elimina los productos finales asociados al pedido
        $order->finishedProducts()->detach();

        // Obtén los productos finales y las cantidades del formulario
        $finishedProductIds = $validatedData['finishedProduct_id'];
        $colors = $validatedData['color_id'];
        $amounts = $validatedData['amount'];

        // Asocia los nuevos productos finales al pedido con sus respectivas cantidades
        foreach ($finishedProductIds as $index => $finishedProductId) {
            $order->finishedProducts()->attach($finishedProductId, [
                'amount' => $amounts[$index],
                'color_id' => $colors[$index]
            ]);
        }

        return redirect()->route('orders.index')
            ->with('success', 'Información actualizada con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->finishedProducts()->detach();
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
