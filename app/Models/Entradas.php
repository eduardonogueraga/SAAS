<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entradas extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function detecciones()
    {
        return $this->hasMany(Deteccion::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function aviso()
    {
        return $this->belongsTo(Aviso::class);
    }

}


