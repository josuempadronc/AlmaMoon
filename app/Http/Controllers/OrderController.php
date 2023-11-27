<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Color;
use App\Models\AssembledProduct;
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
        return view('order.index', ['orders' => $orders]);
    }


    public function pdf($id)
    {
        $order = Order::find($id);
        $date = Carbon::today();

        $pdf = Pdf::loadView(
            'order.pdf',
            compact(
                'order',
                'date',
            )
        );
        return $pdf->stream();
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
        return view('order.create', compact(
            'order',
            'movementDetail',
            'FinishedProduct',
            'AssembledProduct',
            'Destination',
            // 'options',
            'Color'
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
            'name' => 'required',
            'rif' => 'required',
            'destination_id' => 'required',
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
        $order->name = $validatedData['name'];
        $order->rif = $validatedData['rif'];
        $order->destination_id = $validatedData['destination_id'];
        $order->movementDeatil_id = $validatedData['movementDeatil_id'];
        $order->status = $validatedData['status'];
        $order->save();

        // Obtén los productos finales y las cantidades del formulario
        $finishedProductIds = $validatedData['finishedProduct_id'];
        $colors = $validatedData['color'];
        $amounts = $validatedData['amount'];

        // dd($finishedProductIds);
        // dd($colors);
        // dd($amounts);

        // Asocia los productos finales al pedido con sus respectivas cantidades
        foreach ($finishedProductIds as $index => $finishedProductId) {
            $order->finishedProducts()->sync([$finishedProductId => [
                'amount' => $amounts[$index],
                'color' => $colors[$index]
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

        return view('order.show', compact(
            'order',
        ));
    }

    // public function show($id)
    // {
    //     $order = Order::find($id);

    //     // // Recuperar los datos de la orden como cadena de texto
    //     // $dataAsString = $order->data;

    //     // // Convertir la cadena de texto de vuelta a un arreglo
    //     // $dataArray = json_decode($dataAsString, true);

    //     // // Verificar si el arreglo no es nulo y tiene al menos un elemento
    //     // if (!empty($dataArray) && is_array($dataArray)) {
    //     //     $firstKey = array_key_first($dataArray);
    //     //     $firstValue = $dataArray[$firstKey];
    //     // } else {
    //     //     // Manejar el caso cuando el arreglo está vacío o es nulo
    //     //     $firstKey = null;
    //     //     $firstValue = null;
    //     // }

    //     // Pasar los valores a la vista
    //     return view('orders.show', compact('order'));
    // }

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
