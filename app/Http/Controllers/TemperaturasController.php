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
        return response()->json($temperatura, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Temperaturas $temperaturas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Temperaturas $temperaturas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temperaturas $temperaturas)
    {
        //
    }
}
