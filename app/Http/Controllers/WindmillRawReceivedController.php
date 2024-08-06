<?php

namespace App\Http\Controllers;

use App\Models\WindmillRawReceived;
use Illuminate\Http\Request;

/**
 * Class WindmillRawReceivedController
 * @package App\Http\Controllers
 */
class WindmillRawReceivedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $windmillRawReceiveds = WindmillRawReceived::paginate();

        return view('Molino/windmill-raw-received.index', compact('windmillRawReceiveds'))
            ->with('i', (request()->input('page', 1) - 1) * $windmillRawReceiveds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $windmillRawReceived = new WindmillRawReceived();
        return view('Molino/windmill-raw-received.create', compact('windmillRawReceived'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(WindmillRawReceived::$rules);

        $windmillRawReceived = WindmillRawReceived::create($request->all());

        return redirect()->route('windmill-raw-receiveds.index')
            ->with('success', 'WindmillRawReceived created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $windmillRawReceived = WindmillRawReceived::find($id);

        return view('Molino/windmill-raw-received.show', compact('windmillRawReceived'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $windmillRawReceived = WindmillRawReceived::find($id);

        return view('Molino/windmill-raw-received.edit', compact('windmillRawReceived'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  WindmillRawReceived $windmillRawReceived
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WindmillRawReceived $windmillRawReceived)
    {
        request()->validate(WindmillRawReceived::$rules);

        $windmillRawReceived->update($request->all());

        return redirect()->route('windmill-raw-receiveds.index')
            ->with('success', 'WindmillRawReceived updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $windmillRawReceived = WindmillRawReceived::find($id)->delete();

        return redirect()->route('windmill-raw-receiveds.index')
            ->with('success', 'WindmillRawReceived deleted successfully');
    }
}
