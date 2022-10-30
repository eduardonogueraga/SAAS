<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aviso extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function entradas()
    {
        return $this->hasMany(Entradas::class);
    }

    public function detecciones()
    {
        return $this->hasMany(Deteccion::class);
    }

}
