<?php

namespace App\Http\Controllers;

use App\Models\ProductTypeAssembly;
use Illuminate\Http\Request;

/**
 * Class ProductTypeAssemblyController
 * @package App\Http\Controllers
 */
class ProductTypeAssemblyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypeAssemblies = ProductTypeAssembly::paginate();

        return view('Ensamble/product-type-assembly.index', compact('productTypeAssemblies'))
            ->with('i', (request()->input('page', 1) - 1) * $productTypeAssemblies->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypeAssembly = new ProductTypeAssembly();
        return view('Ensamble/product-type-assembly.create', compact('productTypeAssembly'));
    }

    /**
     * Show the form for Importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $archivo = $request->file('TipoProductos');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $ProductTypeAssembly = new ProductTypeAssembly();
            $ProductTypeAssembly->name = $campos[0];
            $ProductTypeAssembly->save();
        }

        return redirect()->route('product-type-assemblies.index')
        ->with('success', 'Se han importado los Tipos de Producto correctamente.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductTypeAssembly::$rules);

        $productTypeAssembly = ProductTypeAssembly::create($request->all());

        return redirect()->route('product-type-assemblies.index')
            ->with('success', 'ProductTypeAssembly created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productTypeAssembly = ProductTypeAssembly::find($id);

        return view('Ensamble/product-type-assembly.show', compact('productTypeAssembly'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productTypeAssembly = ProductTypeAssembly::find($id);

        return view('Ensamble/product-type-assembly.edit', compact('productTypeAssembly'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductTypeAssembly $productTypeAssembly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductTypeAssembly $productTypeAssembly)
    {
        request()->validate(ProductTypeAssembly::$rules);

        $productTypeAssembly->update($request->all());

        return redirect()->route('product-type-assemblies.index')
            ->with('success', 'ProductTypeAssembly updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productTypeAssembly = ProductTypeAssembly::find($id)->delete();

        return redirect()->route('product-type-assemblies.index')
            ->with('success', 'ProductTypeAssembly deleted successfully');
    }
}
