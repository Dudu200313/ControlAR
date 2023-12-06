<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ESPsController extends Controller
{
    //
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ESPs::create([
            'esp_id' => $esp_id->esp_id,
            'dispositivo_id' => $request->dispositivo_id
        ]);
        
        $msg = null;
        $mqtt = MQTT::connection();
        $mqtt->subscribe('test', function (string $topic, string $message) {
            echo sprintf('Received QoS level 1 message on topic [%s]: %s', $topic, $message);
            $msg = $message;
        }, 1);
        $mqtt->loop(true);
        $esp_id = $msg;
        //return redirect(route('dashboard', ['ambiente_id' => $request->ambiente_id]));
    }

    public function estado(){
        MQTT::publish("test/" . 'esp_id' . "power/set", 'off');
        MQTT::publish("test/" . 'esp_id' . "power/set", 'on');

    }
}
