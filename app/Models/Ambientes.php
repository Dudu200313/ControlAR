<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambientes extends Model
{
    use HasFactory;


    protected $fillable = [
        'nome'
    ];


    public function admin(){

        return $this->hasMany(User::class, 'admin_id', 'id');
    }
}
