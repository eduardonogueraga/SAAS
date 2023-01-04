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
            $search = trim($search);
            return $query->orWhere('tipo', 'like', "%$search%")
                ->orWhere('modo', 'like', "%$search%")
                ->orWhere('saa_version', 'like', "%$search%")
                ->orWhere('id', $search); //Pendiente de implementar los datepickers
        });
    }
}
