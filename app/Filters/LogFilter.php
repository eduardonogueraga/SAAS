<?php

namespace App\Filters;

class LogFilter extends QueryFilter
{

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
            return $query->orWhere('descripcion', 'like', "%$search%")
                ->orWhere('id', $search);
        });
    }
}
