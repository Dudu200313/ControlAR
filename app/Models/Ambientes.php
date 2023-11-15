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
        'imagem',
        'user_id',
    ];

    public function admin(){
        return $this->hasMany(User::class, 'user_id', 'id');
    }
}
