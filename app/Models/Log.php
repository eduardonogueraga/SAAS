<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['fecha'];

    public function literales_descripcion() //Formato snake_case para que se lo trage el json_encode
    {
        return $this->belongsTo('App\Models\Literal', 'descripcion', 'codigo');
    }

    public function newQuery($excludeDeleted = true) //Carga la relacion por defecto
    {
        return parent::newQuery($excludeDeleted)->with('literales_descripcion');
    }
    public function newEloquentBuilder($query)
    {
        return new LogQuery($query);
    }
}
