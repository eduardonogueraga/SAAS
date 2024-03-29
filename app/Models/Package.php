<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $dates = ['fecha','d_fecha', 'e_fecha', 'n_fecha', 'l_fecha'];


    public function notices()
    {
        return $this->hasMany(Notice::class);
    }

    public function entries()
    {
        return $this->hasMany(Entry::class);
    }

    public function detections()
    {
        return $this->hasMany(Detection::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }
    public function newEloquentBuilder($query)
    {
        return new PackageQuery($query);
    }
}
