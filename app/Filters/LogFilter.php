<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;
use Illuminate\Support\Str;

class LogFilter extends QueryFilter
{
    use QueryTrait;
    public function rules(): array
    {
        return [
            'search' => 'filled',
        ];
    }

    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            $search = Str::upper($search);

            $filtered = array_filter(trans('data.logs.literales'), function($value) use ($search) {
                return str_contains($value, $search);
            });
            $indices = array_keys($filtered);

            return $query->orWhere('id', $search)
                ->orWhereIn('descripcion', $indices);
        });
    }

}
