<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;

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
            return $query->orWhere('id', $search)
                ->orWhereHas('literales_descripcion', $this->subQuery($search, 'literal'));
        });
    }

}
