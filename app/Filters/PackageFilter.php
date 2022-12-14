<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;

class PackageFilter extends QueryFilter
{
    use QueryTrait;
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroPackageImplantado' => 'in:ok,ko,all',
        ];
    }

    public function filtroPackageImplantado($query, $implantado)
    {
        if ($implantado==='all')
            return $query;

        return $query->where('implantado', '=', (($implantado==='ok')? 1 : 0));
    }
    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            return $query->orWhere('contenido_peticion', 'like', "%$search%")
                ->orWhere('id', $search)
                ->orWhereHas('notices', $this->subQuery($search, 'tipo'))
                //->orWhereHas('notices', $this->subQuery($search, 'asunto'))
                ->orWhereHas('entries', $this->subQuery($search, 'tipo'))
                ->orWhereHas('entries', $this->subQuery($search, 'modo'))
                ->orWhereHas('detections', $this->subQuery($search, 'modo_deteccion'))
                ->orWhereHas('detections.sensor', $this->subQueryRecursiva($search, 'literales_tipo', 'literal'))
                ;
        });
    }


}
