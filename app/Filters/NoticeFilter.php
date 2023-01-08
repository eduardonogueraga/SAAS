<?php

namespace App\Filters;

class NoticeFilter extends QueryFilter
{

    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroNoticeTipo' => 'in:sms,call,all',
        ];
    }

    public function filtroNoticeTipo($query, $tipo)
    {
        if ($tipo==='all')
            return $query;

        return $query->where('tipo', '=', (($tipo==='sms')? 'sms' : 'llamada'));
    }

    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            return $query->orWhere('tipo', 'like', "%$search%")
                ->orWhere('asunto', 'like', "%$search%")
                ->orWhere('cuerpo', 'like', "%$search%")
                ->orWhere('id', $search);
        });
    }
}
