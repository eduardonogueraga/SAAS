<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];


    public function entradas()
    {
        return $this->hasMany(Entry::class);
    }

    public function detecciones()
    {
        return $this->hasMany(Detection::class);
    }

}
