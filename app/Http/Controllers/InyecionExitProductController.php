<?php

namespace App\Http\Controllers;

use App\Models\InyecionExitProduct;
use App\models\FinishedProduct;
use App\Models\TypeMovement;
use App\Models\Color;
use App\Models\Paw;
use App\Models\Destination;
use Illuminate\Http\Request;

/**
 * Class InyecionExitProductController
 * @package App\Http\Controllers
 */
class InyecionExitProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inyecionExitProducts = InyecionExitProduct::paginate();

        return view('Inyeccion/inyecion-exit-product.index', compact('inyecionExitProducts'))
            ->with('i', (request()->input('page', 1) - 1) * $inyecionExitProducts->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inyecionExitProduct = new InyecionExitProduct();
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');
        $destination = Destination::pluck('name', 'id');
        return view(
            'Inyeccion/inyecion-exit-product.create',
            compact(
                'inyecionExitProduct',
                'finishedProduct',
                'typeMovement',
                'colors',
                'paw',
                'destination'
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
        request()->validate(InyecionExitProduct::$rules);

        $inyecionExitProduct = InyecionExitProduct::create($request->all());

        return redirect()->route('inyecion-exit-products.index')
            ->with('success', 'InyecionExitProduct created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inyecionExitProduct = InyecionExitProduct::find($id);

        return view('Inyeccion/inyecion-exit-product.show', compact('inyecionExitProduct'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inyecionExitProduct = InyecionExitProduct::find($id);
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');
        $destination = Destination::pluck('name', 'id');

        return view(
            'Inyeccion/inyecion-exit-product.edit',
            compact(
                'inyecionExitProduct',
                'finishedProduct',
                'typeMovement',
                'colors',
                'paw',
                'destination'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InyecionExitProduct $inyecionExitProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InyecionExitProduct $inyecionExitProduct)
    {
        request()->validate(InyecionExitProduct::$rules);

        $inyecionExitProduct->update($request->all());

        return redirect()->route('inyecion-exit-products.index')
            ->with('success', 'InyecionExitProduct updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inyecionExitProduct = InyecionExitProduct::find($id)->delete();

        return redirect()->route('inyecion-exit-products.index')
            ->with('success', 'InyecionExitProduct deleted successfully');
    }
}
