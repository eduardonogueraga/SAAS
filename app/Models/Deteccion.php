<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deteccion extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];
    protected $table = 'detecciones';

    public function sensor()
    {
        return $this->hasOne(Sensor::class);
    }
}
