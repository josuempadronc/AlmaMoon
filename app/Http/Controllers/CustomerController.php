<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

/**
 * Class CustomerController
 * @package App\Http\Controllers
 */
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::paginate();

        return view('customer.index', compact('customers'))
            ->with('i', (request()->input('page', 1) - 1) * $customers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
         $customer = new Customer();
         return view('customer.create', compact('customer'));

     }
    // public function create(Request $request)
    // {
    //     // Validar los datos enviados por el usuario
    //     $request->validate([
    //         'name' => 'required',
    //         'CI/Rif' => 'required',
    //         'destination_id' => 'required',
    //     ]);

    //     // Crear un nuevo objeto Customer con los datos proporcionados
    //     $customer = new Customer();
    //     $customer->name = $request->input('name');
    //     $customer->CI = $request->input('CI/Rif');
    //     $customer->location = $request->input('destination_id');

    //     // Guardar el nuevo cliente en la base de datos
    //     $customer->save();

    //     // Redirigir al usuario a la página de éxito o mostrar un mensaje de éxito
    //     return redirect()->route('success')->with('message', 'Cliente creado exitosamente.');
    //}

    public function getCustomerData(Request $request)
    {
        $customerId = $request->input('customerId');

        // Obtener los datos del cliente según el ID recibido
        $customer = Customer::find($customerId);

        // Verificar si se encontró el cliente
        if ($customer) {
            $data = [
                'ci' => $customer->ci,
                'location' => $customer->location,
            ];
            return response()->json($data);
        }

        // Si no se encontró el cliente, devolver una respuesta de error
        return response()->json(['error' => 'Cliente no encontrado'], 404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Customer::$rules);

        $customer = Customer::create($request->all());

        return redirect()->route('customer.index')
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
        $customer = Customer::find($id);

        return view('customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        return view('customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        request()->validate(Customer::$rules);

        $customer->update($request->all());

        return redirect()->route('customer.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $customer = Customer::find($id)->delete();

        return redirect()->route('customer.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
