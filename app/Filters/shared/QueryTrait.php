<?php

namespace App\Filters\shared;

use Carbon\Carbon;

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


    public function dateFrom($query, $date)
    {
        if($date === null)
            return $query;

        $date = Carbon::createFromFormat('d-m-Y H:i', $date);
        $query->where('fecha', '>=', $date->format('Y-m-d H:i:s'));
    }

    public function dateTo($query, $date)
    {
        if($date === null)
            return $query;

        $date = Carbon::createFromFormat('d-m-Y H:i', $date);
        $query->where('fecha', '<=', $date->format('Y-m-d H:i:s'));
    }
}
