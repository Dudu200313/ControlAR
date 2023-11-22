<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivos;

class DispositivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dispositivos = Dispositivos::all();
        return response()->json(['dispositivos' => $dispositivos], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'marca' => 'required|string|max:255',
            'estado' => 'boolean',
            'temperatura' => 'required|numeric'
        ]);

        $dispositivo = Dispositivos::create([
            'marca' => $request->input('marca'),
            'estado' => $request->input('estado'),
            'temperatura' => $request->input('temperatura')
        ]);

        return response()->json(['dispositivo' => $dispositivo], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dispositivo = Dispositivos::find($id);

        if (!$dispositivo) {
            return response()->json(['message' => 'Dispositivo não encontrado'], 404);
        }

        return response()->json(['dispositivo' => $dispositivo], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'marca' => 'string|max:255',
            'estado' => 'boolean',
            'temperatura' => 'numeric'
        ]);

        $dispositivo = Dispositivos::find($id);

        if (!$dispositivo) {
            return response()->json(['message' => 'Dispositivo não encontrado'], 404);
        }

        $dispositivo->update($request->all());

        return response()->json(['dispositivo' => $dispositivo], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dispositivo = Dispositivos::find($id);

        if (!$dispositivo) {
            return response()->json(['message' => 'Dispositivo não encontrado'], 404);
        }

        $dispositivo->delete();

        return response()->json(['message' => 'Dispositivo excluído com sucesso'], 200);
    }
}
