<?php

namespace App\Filters\shared;

trait QueryTrait
{
    public function subQuery($search, $column)
    {
        return function ($query) use ($search, $column) {
            $query->where($column, 'like', "%{$search}%");
        };
    }

    public function subQueryRecursiva($search, $relation)
    {
        return function ($query) use ($search, $relation) {
            $query->whereHas($relation, $this->subQuery($search, 'tipo'));
        };
    }
}
