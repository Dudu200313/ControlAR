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
    ];

    public function admin(){
        return $this->hasMany(Ambientes::class, 'user_id', 'id');
    }
}


