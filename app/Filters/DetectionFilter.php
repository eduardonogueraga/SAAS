<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;
use Illuminate\Support\Str;

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
            $search = Str::upper($search);

            $filtered = array_filter(trans('data.sensor.literales'), function($value) use ($search) {
                return str_contains($value, $search);
            });
            $indices = array_keys($filtered);

            return $query->orWhere('id', $search)
                ->orWhere('modo_deteccion', 'like', "%$search%")
                ->orWhereHas('sensor', $this->subQueryIn($indices, 'tipo'))
                ->orWhereHas('sensor', $this->subQuery($search, 'estado'))
                ;
        });
    }



}
