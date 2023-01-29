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

    public function subQueryIn($arr, $column)
    {
        return function ($query) use ($arr, $column) {
            $query->whereIn($column, $arr);
        };
    }

    public function subQueryRecursiva($search, $relation, $subCol)
    {
        return function ($query) use ($search, $relation, $subCol) {
            $query->whereHas($relation, $this->subQuery($search, $subCol));
        };
    }
}
