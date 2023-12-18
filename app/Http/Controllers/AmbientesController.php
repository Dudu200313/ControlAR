<?php

namespace App\Http\Controllers;

use App\Models\Ambientes;
use Illuminate\Http\Request;

class AmbientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ambientes = Ambientes::all();
        return response()->json(['ambientes' => $ambientes], 200);
    }

    public function create(){
        return view('criarambiente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Ambientes::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'user_id' => $request->user()->id
        ]);
        
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ambiente = Ambientes::find($id);

        if (!$ambiente) {
            return response()->json(['message' => 'Ambiente não encontrado'], 404);
        }

        return response()->json(['ambiente' => $ambiente], 200);
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
            'nome' => 'string|max:255',
            'user_id' => 'exists:users,id'
        ]);

        $ambiente = Ambientes::find($id);

        if (!$ambiente) {
            return response()->json(['message' => 'Ambiente não encontrado'], 404);
        }

        $ambiente->update($request->all());

        return response()->json(['ambiente' => $ambiente], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ambiente = Ambientes::find($id);

        if (!$ambiente) {
            return response()->json(['message' => 'Ambiente não encontrado'], 404);
        }

        $ambiente->delete();

        return response()->json(['message' => 'Ambiente excluído com sucesso'], 200);
    }
}


