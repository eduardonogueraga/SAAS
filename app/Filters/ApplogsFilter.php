<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;

class ApplogsFilter extends QueryFilter
{
    use QueryTrait;
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroApplogsTipo' => 'in:alarm,api,all',
            'filtroApplogsError' => 'in:alarm,ok,err',
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
}
