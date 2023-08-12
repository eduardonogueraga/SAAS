<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;

class SystemNoticeFilter extends QueryFilter
{

    use QueryTrait;

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroSystemNoticesTipo' => 'in:alarm,sys',
            'filtroSystemNoticesEstado' => 'in:0,1',
            'dateFrom' => 'date_format:d-m-Y H:i',
            'dateTo' => 'date_format:d-m-Y H:i',
        ];
    }

    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            return $query->orWhere('id', $search)
                ->orWhere('tipo', 'like', "%$search%")
                ->orWhere('desc', 'like', "%$search%");
        });
    }
    public function filtroSystemNoticesTipo($query, $tipo)
    {
        if ($tipo==='all')
            return $query;
        return $query->where('tipo', '=', $tipo);
    }

    public function filtroSystemNoticesEstado($query, $tipo)
    {
        if ($tipo==='all')
            return $query;
        if($tipo === '0' || $tipo === '1'){
            return $query->where('procesado', '=', $tipo);
        }else {
            return $query;
        }

    }
}
