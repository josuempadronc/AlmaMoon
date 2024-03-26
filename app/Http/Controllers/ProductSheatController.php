<?php

namespace App\Http\Controllers;

use App\Models\ProductSheat;
use App\Models\Color;
use App\Models\AssemblyInput;
// use App\Models\ProductComponent;
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
        $productSheats = ProductSheat::with('assemblyInputs')->get();

        // dd($productSheats);

        return view(
            'Ensamble/product-sheat.index',
            compact('productSheats')
        );
    }

    /**
     * Show the form for calculator a Productions.
     *
     * @return \Illuminate\Http\Response
     */

    public function calculator($id)
    {
        // Obtén la cantidad total desde tu formulario o donde esté disponible
        $amountTotal = request()->input('cantidad_total');

        // Obtén los insumos relacionados con tu modelo 'ProductSheat'
        $productSheat = ProductSheat::findOrFail($id); // Reemplaza $id con el ID correspondiente
        $inputs = $productSheat->assemblyInputs;

        // Calcula los valores multiplicando la cantidad total por las cantidades de cada insumo
        $totals = [];
        foreach ($inputs as $input) {
            $cantidadInsumo = $input->pivot->amount;
            $value = $amountTotal * $cantidadInsumo;
            $total[] = [
                'input' => $input->name,
                'value' => $value,
            ];
        }

        return view(
            'Ensamble/product-sheat.index',
            compact('totals')
        );
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productSheat = new ProductSheat();
        $colors = Color::pluck('name', 'id');
        $input = AssemblyInput::pluck('name', 'id');
        return view(
            'Ensamble/product-sheat.create',
            compact(
                'productSheat',
                'colors',
                'input',
            )
        );
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'color_id' => 'required',
            'assembly_input_id' => 'required|array|min:1',
            'assembly_input_id.*' => 'required',
            'amount' => 'required|array',
            'amount.*' => 'numeric',
        ];

        $validateData = $request->validate($rules);

        $sheat = new ProductSheat();
        $sheat->name = $validateData['name'];
        $sheat->color_id = $validateData['color_id'];
        $sheat->save();

        $input_ids = $validateData['assembly_input_id'];
        $amounts = $validateData['amount'];

        foreach ($input_ids as $index => $input_id) {
            $sheat->assemblyInputs()->attach([
                $input_id =>
                ['amount' => $amounts[$index]]
            ]);
        }
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
        $colors = Color::pluck('name', 'id');
        $input = AssemblyInput::pluck('name', 'id');
        $productComponents = $productSheat->assemblyInputs;

        // dd($productComponents);

        return view(
            'Ensamble/product-sheat.show',
            compact(
                'productSheat',
                'colors',
                'input',
                'productComponents',
            )
        );
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
        $colors = Color::pluck('name', 'id');
        $input = AssemblyInput::pluck('name', 'id');
        $productComponents = $productSheat->assemblyInputs;
        return view(
            'Ensamble/product-sheat.edit',
            compact(
                'productSheat',
                'colors',
                'input',
                'productComponents',
            )
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductSheat $productSheat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'color_id' => 'required',
            'assembly_input_id' => 'required|array',
            'assembly_input_id.*' => 'required',
            'amount' => 'required',
            'amount.*' => 'numeric',
        ];

        $validateData = $request->validate($rules);

        $sheat =  ProductSheat::find($id);
        $sheat->name = $validateData['name'];
        $sheat->color_id = $validateData['color_id'];
        $sheat->save();

        $input_ids = $validateData['assembly_input_id'];
        $amounts = $validateData['amount'];

        foreach ($input_ids as $index => $input_id) {
            $sheat->assemblyInputs()->attach([
                $input_id => [
                    "amount" => $amounts[$index]
                ]
            ]);
        }
        // request()->validate(ProductSheat::$rules);

        // $productSheat->update($request->all());

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
