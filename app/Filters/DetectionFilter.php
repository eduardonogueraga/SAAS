<?php

namespace App\Filters;

use Psy\Util\Str;

class DetectionFilter extends QueryFilter
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
            return $query->orWhere('id', $search)
                ->orWhere('modo_deteccion', 'like', "%$search%")
                ->orWhere('intrusismo',  (str_contains('intrusismo', strtolower($search))))
               // ->orWhere('restaurado',  (str_contains('restaurada', strtolower($search))))
                ->orWhereHas('sensor', $this->subQuery($search, 'tipo'))
                ->orWhereHas('sensor', $this->subQuery($search, 'estado'))
                ;
        });
    }

    public function subQuery($search, $column)
    {
        return function ($query) use ($search, $column) {
            $query->where($column, 'like', "%{$search}%");
        };
    }

}
