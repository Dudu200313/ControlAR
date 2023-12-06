<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ESPs extends Model
{
    use HasFactory;
    protected $fillable = [
        'esp_id',
        'dispositivo_id',
    ];

    public function dispositivos(){
        return $this->belongsTo(Dispositivos::class, 'dispositivo_id', 'id');
    }
}
