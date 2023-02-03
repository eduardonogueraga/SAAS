<?php

namespace App\Filters;
use Carbon\Carbon;

class ApplogsFilter extends QueryFilter
{

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroApplogsTipo' => 'in:alarm,api,all',
            'filtroApplogsError' => 'in:alarm,ok,err',
            'dateFrom' => 'date_format:d-m-Y H:i',
            'dateTo' => 'date_format:d-m-Y H:i',
        ];
    }

    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            return $query->orWhere('id', $search)
                ->orWhere('respuesta_http', 'like', "%$search%")
                ->orWhere('contenido_peticion', 'like', "%$search%")
                ->orWhere('desc', 'like', "%$search%")
                ->orWhere('error', 'like', "%$search%");
        });
    }
    public function filtroApplogsTipo($query, $tipo)
    {
        if ($tipo==='all')
            return $query;
        return $query->where('tipo', '=', $tipo);
    }

    public function filtroApplogsError($query, $err)
    {
        if ($err==='all')
            return $query;

        $metodo = $err === 'err' ? 'whereNotNull': 'whereNull';
        return $query->$metodo('error');
    }

    public function dateFrom($query, $date)
    {
        if($date === null)
            return $query;

        $date = Carbon::createFromFormat('d-m-Y H:i', $date);
        $query->where('created_at', '>=', $date->format('Y-m-d H:i:s'));
    }

    public function dateTo($query, $date)
    {
        if($date === null)
            return $query;

        $date = Carbon::createFromFormat('d-m-Y H:i', $date);
        $query->where('created_at', '<=', $date->format('Y-m-d H:i:s'));
    }
}
