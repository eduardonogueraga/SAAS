<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;
use Illuminate\Support\Str;

class NoticeFilter extends QueryFilter
{
use QueryTrait;
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroNoticeTipo' => 'in:sms,call,all',
            'dateFrom' => 'date_format:d-m-Y H:i',
            'dateTo' => 'date_format:d-m-Y H:i',
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
            $search = Str::upper($search);

            $filtered = array_filter(trans('data.notices.literales'), function($value) use ($search) {
                return str_contains($value, $search);
            });
            $indices = array_keys($filtered);

            return $query->orWhere('tipo', 'like', "%$search%")
                ->orWhereIn('asunto', $indices)
                ->orWhere('cuerpo', 'like', "%$search%")
                ->orWhere('id', $search);
        });
    }
}
