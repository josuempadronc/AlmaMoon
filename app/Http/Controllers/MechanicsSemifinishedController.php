<?php

namespace App\Http\Controllers;

use App\Models\MechanicsSemifinished;
use Illuminate\Http\Request;

/**
 * Class MechanicsSemifinishedController
 * @package App\Http\Controllers
 */
class MechanicsSemifinishedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mechanicsSemifinisheds = MechanicsSemifinished::paginate();

        return view('MetalMecanica/mechanics-semifinished.index', compact('mechanicsSemifinisheds'))
            ->with('i', (request()->input('page', 1) - 1) * $mechanicsSemifinisheds->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mechanicsSemifinished = new MechanicsSemifinished();
        return view('MetalMecanica/mechanics-semifinished.create', compact('mechanicsSemifinished'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MechanicsSemifinished::$rules);

        $mechanicsSemifinished = MechanicsSemifinished::create($request->all());

        return redirect()->route('mechanics-semifinisheds.index')
            ->with('success', 'MechanicsSemifinished created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mechanicsSemifinished = MechanicsSemifinished::find($id);

        return view('MetalMecanica/mechanics-semifinished.show', compact('mechanicsSemifinished'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mechanicsSemifinished = MechanicsSemifinished::find($id);

        return view('MetalMecanica/mechanics-semifinished.edit', compact('mechanicsSemifinished'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MechanicsSemifinished $mechanicsSemifinished
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MechanicsSemifinished $mechanicsSemifinished)
    {
        request()->validate(MechanicsSemifinished::$rules);

        $mechanicsSemifinished->update($request->all());

        return redirect()->route('mechanics-semifinisheds.index')
            ->with('success', 'MechanicsSemifinished updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $mechanicsSemifinished = MechanicsSemifinished::find($id)->delete();

        return redirect()->route('mechanics-semifinisheds.index')
            ->with('success', 'MechanicsSemifinished deleted successfully');
    }
}
