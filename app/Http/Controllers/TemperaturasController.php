<?php

namespace App\Http\Controllers;

use App\Models\Temperaturas;
use Illuminate\Http\Request;

class TemperaturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $temperatura = Temperaturas::all();
        return response()->json($temperaturas, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, ['valor' => 'required|string|max:255']);

        $temperaturas = Temperaturas::create([
            'valor' => $request->input('valor')
        ]);

        return response()->json(['temperaturas'=> $temperaturas], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Temperaturas $temperaturas)
    {
        //
        $temperaturas = Temperaturas::all();
        return response()->json($temperaturas, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Temperaturas $temperaturas, $id)
    {
        $this->validate($request,['valor' => 'required|string|max:255']);

        $temperaturas = Temperaturas::find($id);

        if(!$temperaturas){
            return response()->json(['message' => 'erro no update de temperaturas'], 404);
        }

        $temperaturas->update($request->all());


        return response()->json(['temperaturas' => $temperaturas], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temperaturas $temperaturas, $id)
    {
        //
        $temperaturas = Temperaturas::find($id);

        if(!temperaturas){
            return response()->json(['message' => 'erro no delete de temperaturas'], 404);
        }

        $temperaturas->delete();

        return response()->json(['message' => 'excluido com sucesso'], 200);
    }
}
