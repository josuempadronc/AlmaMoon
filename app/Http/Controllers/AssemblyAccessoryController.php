<?php

namespace App\Http\Controllers;

use App\Models\AssemblyAccessory;
use App\Models\Color;
use function Laravel\Prompts\alert;
use Illuminate\Http\Request;

/**
 * Class AssemblyAccessoryController
 * @package App\Http\Controllers
 */
class AssemblyAccessoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assemblyAccessories = AssemblyAccessory::paginate();

        return view(
            'Ensamble/assembly-accessory.index',
            compact('assemblyAccessories')
        )
            ->with('i', (request()
                ->input('page', 1) - 1) * $assemblyAccessories
                ->perPage()
            );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $assemblyAccessory = new AssemblyAccessory();
        $colors = Color::pluck('name', 'id');
        return view(
            'Ensamble/assembly-accessory.create',
            compact(
                'assemblyAccessory',
                'colors'
            )
        );
    }

    /**
     * Show the form for Importing a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {

        $archivo = $request->file('Accesorios');
        $contenido = file($archivo->getRealPath());

        // Empezamos desde la segunda línea para omitir el encabezado
        for ($i = 1; $i < count($contenido); $i++) {
            $linea = trim($contenido[$i]);
            $campos = explode(',', $linea);

            $AssemblyAccessory = new AssemblyAccessory();
            $AssemblyAccessory->name = $campos[0];

            // Buscar el modelo Color por nombre
            $color = Color::where('name', $campos[1])->first();
            // dd($campos[1]);

            if ($color) {
                $AssemblyAccessory->color_id = $color->id;
            } else {
                alert("El color '$campos[1]' no existe en la base de datos.");
            }
            // dd($color);

            $AssemblyAccessory->amount = $campos[2];

            $AssemblyAccessory->save();
        }
        return redirect()->route('finished-products.index')
            ->with('success', 'Se han importado los Accesorios correctamente.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AssemblyAccessory::$rules);

        $assemblyAccessory = AssemblyAccessory::create($request->all());

        return redirect()->route('assembly-accessories.index')
            ->with('success', 'Informacion guardada con exito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assemblyAccessory = AssemblyAccessory::find($id);

        return view(
            'Ensamble/assembly-accessory.show',
            compact('assemblyAccessory')
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
        $assemblyAccessory = AssemblyAccessory::find($id);
        $colors = Color::pluck('name', 'id');

        return view('Ensamble/assembly-accessory.edit', compact(
            'assemblyAccessory',
            'colors'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AssemblyAccessory $assemblyAccessory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssemblyAccessory $assemblyAccessory)
    {
        request()->validate(AssemblyAccessory::$rules);

        $assemblyAccessory->update($request->all());

        return redirect()->route('assembly-accessories.index')
            ->with('success', 'Informacion Actualizada con Exito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $assemblyAccessory = AssemblyAccessory::find($id)->delete();

        return redirect()->route('assembly-accessories.index')
            ->with('success', 'Informacion Eliminada con Exito');
    }
}
