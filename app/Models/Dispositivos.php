<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'estado',
        'temperatura',
        'esp_id',
        'ambiente_id',
    ];

    public function ambiente(){
        return $this->belongsTo(Ambientes::class, 'ambiente_id', 'id');
    }
}
