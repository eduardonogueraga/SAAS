<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;

class EntryFilter extends QueryFilter
{
    use QueryTrait;

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroEntryModo' => 'in:auto,man,all',
            'filtroEntryEstado' => 'in:original,restored,all',
            'filtroEntryTipo' => 'in:on,off,all',
            'dateFrom' => 'date_format:d-m-Y H:i',
            'dateTo' => 'date_format:d-m-Y H:i',
        ];
    }

    public function filtroEntryTipo($query, $tipo)
    {
        if ($tipo==='all')
            return $query;

        return $query->where('tipo', '=', (($tipo==='on')? 'activacion' : 'desactivacion'));
    }
    public function filtroEntryEstado($query, $restored)
    {
        if ($restored==='all')
            return $query;

        return $query->where('restaurada', '=', (($restored==='original')? 0 : 1));
    }
    public function filtroEntryModo($query, $modo)
    {
        if ($modo==='all')
            return $query;

        return $query->where('modo', '=', (($modo==='auto')? 'automatica' : 'manual'));
    }
    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            return $query->orWhere('tipo', 'like', "%$search%")
                ->orWhere('modo', 'like', "%$search%")
                ->orWhere('id', $search); //Pendiente de implementar los datepickers
        });
    }

}
