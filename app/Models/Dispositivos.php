<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivos extends Model
{
    use HasFactory;


    protected $fillable = [
        'tipo',
        'estado',
        'temperatura',
    ];


    public function admin(){

        return $this->hasMany(Ambientes::class, 'admin_id', 'id');
    }
}


