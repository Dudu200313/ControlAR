<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispositivos;
use PhpMqtt\Client\Facades\MQTT;

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

    public function create($ambiente_id){
        return view('criardispositivo', ['ambiente_id' => $ambiente_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Dispositivos::create([
            'marca' => $request->marca,
            'estado' => $request->estado,
            'temperatura' => $request->temperatura,
            'ambiente_id' => $request->ambiente_id
        ]);
        
        return redirect(route('dashboard', ['ambiente_id' => $request->ambiente_id]));

        $msg = null;
        $mqtt = MQTT::connection();
        $mqtt->subscribe('test', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
            $msg = $message;
        }, 1);
        $mqtt->loop(true);
        $esp_id = $msg;

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

    // função para publicar mensagem no tópico 'test'
    public function publicar(){        
        MQTT::publish('test', 'Hello World!');
    }
    public function estado(){
        MQTT::publish('test', 'on');
    }

   
}
