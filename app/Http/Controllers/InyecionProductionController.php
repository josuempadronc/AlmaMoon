<?php

namespace App\Http\Controllers;

use App\Models\InyecionProduction;
use App\Models\FinishedProduct;
use App\Models\color;
use App\Models\Paw;
use App\Models\Destination;
use App\Models\Location;
use Illuminate\Http\Request;

/**
 * Class InyecionProductionController
 * @package App\Http\Controllers
 */
class InyecionProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inyecionProductions = InyecionProduction::paginate();

        return view('Inyeccion/inyecion-production.index', compact('inyecionProductions'))
            ->with('i', (request()->input('page', 1) - 1) * $inyecionProductions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inyecionProduction = new InyecionProduction();
        $finishedProduct = FinishedProduct::pluck('name','id');
        $color= Color::pluck('name','id');
        $paw = Paw::pluck('name','id');
        $destination = Destination::pluck('name','id');
        $location = Location::pluck('name','id');
        return view('Inyeccion/inyecion-production.create',
        compact(
            'inyecionProduction',
            'finishedProduct',
            'color',
            'paw',
            'destination',
            'location',
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
        request()->validate(InyecionProduction::$rules);

        $inyecionProduction = InyecionProduction::create($request->all());

        return redirect()->route('inyecion-productions.index')
            ->with('success', 'InyecionProduction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inyecionProduction = InyecionProduction::find($id);

        return view('Inyeccion/inyecion-production.show', compact('inyecionProduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inyecionProduction = InyecionProduction::find($id);

        $finishedProduct = FinishedProduct::pluck('name','id');
        $color= Color::pluck('name','id');
        $paw = Paw::pluck('name','id');
        $destination = Destination::pluck('name','id');
        $location = Location::pluck('name','id');
        return view('Inyeccion/inyecion-production.edit',
        compact(
            'inyecionProduction',
            'finishedProduct',
            'color',
            'paw',
            'destination',
            'location',

        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InyecionProduction $inyecionProduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InyecionProduction $inyecionProduction)
    {
        request()->validate(InyecionProduction::$rules);

        $inyecionProduction->update($request->all());

        return redirect()->route('inyecion-productions.index')
            ->with('success', 'InyecionProduction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inyecionProduction = InyecionProduction::find($id)->delete();

        return redirect()->route('inyecion-productions.index')
            ->with('success', 'InyecionProduction deleted successfully');
    }
}
