<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sensor extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function literales_tipo() //Formato snake_case para que se lo trage el json_encode
    {
        return $this->belongsTo('App\Models\Literal', 'tipo', 'codigo');
    }
    public function newQuery($excludeDeleted = true) //Carga la relacion por defecto
    {
        return parent::newQuery($excludeDeleted)->with('literales_tipo');
    }

}
