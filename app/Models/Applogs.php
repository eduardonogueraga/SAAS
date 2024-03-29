<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applogs extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function newEloquentBuilder($query)
    {
        return new ApplogsQuery($query);
    }
}
