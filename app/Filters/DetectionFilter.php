<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;
use Psy\Util\Str;

class DetectionFilter extends QueryFilter
{
use QueryTrait;
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroDetectionModo' =>'in:norm,phan,all',
            'filtroDetectionIntrusismo' => 'in:simp,deto,all',
            'filtroDetectionEstado' => 'in:original,restored,all',
            'filtroDetectionSensor' => 'filled'
        ];
    }

    public function filtroDetectionSensor($query, $sensor)
    {
        if ($sensor==='all')
            return $query;

        return $query->whereHas('sensor', $this->subQuery($sensor, 'tipo'));

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
                ->orWhereHas('sensor', $this->subQueryRecursiva($search, 'literales_tipo', 'literal'))
                ->orWhereHas('sensor', $this->subQuery($search, 'estado'))
                ;
        });
    }



}
