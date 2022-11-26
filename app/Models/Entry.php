<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function detections()
    {
        return $this->hasMany(Detection::class)->with('sensor');
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

}


