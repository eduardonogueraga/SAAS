<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['fecha'];

    public function entradas()
    {
        return $this->hasMany(Entry::class);
    }

    public function detecciones()
    {
        return $this->hasMany(Detection::class);
    }

    public function literales_asunto() //Formato snake_case para que se lo trage el json_encode
    {
        return $this->belongsTo('App\Models\Literal', 'asunto', 'codigo');
    }
    public function newQuery($excludeDeleted = true) //Carga la relacion por defecto
    {
        return parent::newQuery($excludeDeleted)->with('literales_asunto');
    }

    public function newEloquentBuilder($query)
    {
        return new NoticeQuery($query);
    }
}
