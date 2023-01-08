<?php

namespace App\Filters;

use Psy\Util\Str;

class DetectionFilter extends QueryFilter
{

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroDetectionModo' =>'in:norm,phan,all',
            'filtroDetectionIntrusismo' => 'in:simp,deto,all',
            'filtroDetectionEstado' => 'in:original,restored,all',
        ];
    }

    public function filtroDetectionIntrusismo($query, $instrusismo)
    {
        if ($instrusismo==='all')
            return $query;

        return $query->where('intrusismo', '=', (($instrusismo==='simp')? 0 : 1));
    }

    public function filtroDetectionModo($query, $modo)
    {
        if ($modo==='all')
            return $query;

        return $query->where('modo_deteccion', '=', (($modo==='norm')? 'normal' : 'phantom'));
    }

    public function filtroDetectionEstado($query, $restored)
    {
        if ($restored==='all')
            return $query;
        return $query->where('restaurado', '=', (($restored==='original')? 0 : 1));
    }

    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            return $query->orWhere('id', $search)
                ->orWhere('modo_deteccion', 'like', "%$search%")
                //->orWhere('intrusismo',  (str_contains('intrusismo', strtolower($search))))
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
