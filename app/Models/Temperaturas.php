<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temperaturas extends Model
{
    use HasFactory;

    Protected $fillable = [
        'valor',
    ];
}
