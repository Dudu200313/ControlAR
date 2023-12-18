<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'user_id',
    ];

    public function admin(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function dispositivos(){
        return $this->hasMany(Dispositivos::class, 'ambiente_id', 'id');
    }
}
