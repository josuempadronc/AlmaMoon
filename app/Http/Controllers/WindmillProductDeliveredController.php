<?php

namespace App\Http\Controllers;

use App\Models\WindmillProductDelivered;
use Illuminate\Http\Request;

/**
 * Class WindmillProductDeliveredController
 * @package App\Http\Controllers
 */
class WindmillProductDeliveredController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $windmillProductDelivereds = WindmillProductDelivered::paginate();

        return view('Molino/windmill-product-delivered.index', compact('windmillProductDelivereds'))
            ->with('i', (request()->input('page', 1) - 1) * $windmillProductDelivereds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $windmillProductDelivered = new WindmillProductDelivered();
        return view('Molino/windmill-product-delivered.create', compact('windmillProductDelivered'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(WindmillProductDelivered::$rules);

        $windmillProductDelivered = WindmillProductDelivered::create($request->all());

        return redirect()->route('windmill-product-delivereds.index')
            ->with('success', 'WindmillProductDelivered created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $windmillProductDelivered = WindmillProductDelivered::find($id);

        return view('Molino/windmill-product-delivered.show', compact('windmillProductDelivered'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $windmillProductDelivered = WindmillProductDelivered::find($id);

        return view('Molino/windmill-product-delivered.edit', compact('windmillProductDelivered'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WindmillProductDelivered $windmillProductDelivered
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WindmillProductDelivered $windmillProductDelivered)
    {
        request()->validate(WindmillProductDelivered::$rules);

        $windmillProductDelivered->update($request->all());

        return redirect()->route('windmill-product-delivereds.index')
            ->with('success', 'WindmillProductDelivered updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $windmillProductDelivered = WindmillProductDelivered::find($id)->delete();

        return redirect()->route('windmill-product-delivereds.index')
            ->with('success', 'WindmillProductDelivered deleted successfully');
    }
}
