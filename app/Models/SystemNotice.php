<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemNotice extends Model
{
    use HasFactory;
    protected $dates = ['fecha'];
    protected $guarded = [];

    public function newEloquentBuilder($query)
    {
        return new SystemNoticeQuery($query);
    }

}
