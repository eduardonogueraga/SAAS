<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detection extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $dates = ['fecha'];
    public function sensor()
    {
        return $this->hasOne(Sensor::class)->with('terminal');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function newEloquentBuilder($query)
    {
        return new DetectionQuery($query);
    }

}

