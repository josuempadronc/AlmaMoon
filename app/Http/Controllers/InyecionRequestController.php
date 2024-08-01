<?php

namespace App\Http\Controllers;

use App\Models\InyecionRequest;
use App\models\FinishedProduct;
use App\Models\TypeMovement;
use App\Models\Color;
use App\Models\Paw;
use Illuminate\Http\Request;

/**
 * Class InyecionRequestController
 * @package App\Http\Controllers
 */
class InyecionRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inyecionRequests = InyecionRequest::paginate();

        return view('Inyeccion/inyecion-request.index', compact('inyecionRequests'))
            ->with('i', (request()->input('page', 1) - 1) * $inyecionRequests->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inyecionRequest = new InyecionRequest();
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');
        
        return view('Inyeccion/inyecion-request.create',
        compact(
            'inyecionRequest',
            'finishedProduct',
            'typeMovement',
            'colors',
            'paw',
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
        request()->validate(InyecionRequest::$rules);

        $inyecionRequest = InyecionRequest::create($request->all());

        return redirect()->route('inyecion-requests.index')
            ->with('success', 'Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inyecionRequest = InyecionRequest::find($id);

        return view('Inyeccion/inyecion-request.show', compact('inyecionRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inyecionRequest = InyecionRequest::find($id);
        $finishedProduct = FinishedProduct::pluck('name', 'id');
        $typeMovement = TypeMovement::pluck('name', 'id');
        $colors = Color::pluck('name', 'id');
        $paw = Paw::pluck('name', 'id');
        
        return view('Inyeccion/inyecion-request.edit',
        compact(
            'inyecionRequest',
            'finishedProduct',
            'typeMovement',
            'colors',
            'paw',
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InyecionRequest $inyecionRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InyecionRequest $inyecionRequest)
    {
        request()->validate(InyecionRequest::$rules);

        $inyecionRequest->update($request->all());

        return redirect()->route('inyecion-requests.index')
            ->with('success', 'Actualizado Correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inyecionRequest = InyecionRequest::find($id)->delete();

        return redirect()->route('inyecion-requests.index')
            ->with('success', 'Eliminado Correctamente');
    }
}
