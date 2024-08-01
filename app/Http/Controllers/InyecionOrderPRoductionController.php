<?php

namespace App\Http\Controllers;

use App\Models\InyecionOrderPRoduction;
use App\models\FinishedProduct;
use App\Models\TypeMovement;
use App\Models\Color;
use App\Models\Paw;
use Illuminate\Http\Request;

/**
 * Class InyecionOrderPRoductionController
 * @package App\Http\Controllers
 */
class InyecionOrderPRoductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inyecionOrderPRoductions = InyecionOrderPRoduction::paginate();

        return view('Inyeccion/inyecion-order-p-roduction.index', compact('inyecionOrderPRoductions'))
            ->with('i', (request()->input('page', 1) - 1) * $inyecionOrderPRoductions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inyecionOrderPRoduction = new InyecionOrderPRoduction();
       $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');
        return view(
            'Inyeccion/inyecion-order-p-roduction.create',
            compact(
                'inyecionOrderPRoduction',
                'finishedProduct',
                'typeMovement',
                'colors',
                'paw',
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
        request()->validate(InyecionOrderPRoduction::$rules);

        $inyecionOrderPRoduction = InyecionOrderPRoduction::create($request->all());

        return redirect()->route('inyecion-order-p-roductions.index')
            ->with('success', 'InyecionOrderPRoduction created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inyecionOrderPRoduction = InyecionOrderPRoduction::find($id);

        return view('Inyeccion/inyecion-order-p-roduction.show', compact('inyecionOrderPRoduction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inyecionOrderPRoduction = InyecionOrderPRoduction::find($id);
       $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');

        return view(
            'Inyeccion/inyecion-order-p-roduction.edit',
            compact(
                'inyecionOrderPRoduction',
                'finishedProduct',
                'typeMovement',
                'colors',
                'paw',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InyecionOrderPRoduction $inyecionOrderPRoduction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InyecionOrderPRoduction $inyecionOrderPRoduction)
    {
        request()->validate(InyecionOrderPRoduction::$rules);

        $inyecionOrderPRoduction->update($request->all());

        return redirect()->route('inyecion-order-p-roductions.index')
            ->with('success', 'InyecionOrderPRoduction updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inyecionOrderPRoduction = InyecionOrderPRoduction::find($id)->delete();

        return redirect()->route('inyecion-order-p-roductions.index')
            ->with('success', 'InyecionOrderPRoduction deleted successfully');
    }
}
