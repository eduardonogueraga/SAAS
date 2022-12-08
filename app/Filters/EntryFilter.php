<?php

namespace App\Filters;

class EntryFilter extends QueryFilter
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
            return $query->orWhere('tipo', 'like', "%$search%")
                ->orWhere('modo', 'like', "%$search%");
        });
    }
}
