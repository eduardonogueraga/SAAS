<?php

namespace App\Filters;

use App\Filters\shared\QueryTrait;
use Illuminate\Support\Str;

class PackageFilter extends QueryFilter
{
    use QueryTrait;
    public function rules(): array
    {
        return [
            'search' => 'filled',
            'filtroPackageImplantado' => 'in:ok,ko,all',
            'filtroPackageContenido' => 'in:full,empty,all'
        ];
    }

    public function filtroPackageImplantado($query, $implantado)
    {
        if ($implantado==='all')
            return $query;

        return $query->where('implantado', '=', (($implantado==='ok')? 1 : 0));
    }

    public function filtroPackageContenido($query, $contenido)
    {
        if ($contenido==='all')
            return $query;

        $metodo = $contenido === 'full' ? 'orWhereHas': 'doesntHave';

        return $query->$metodo('entries')
            ->$metodo('detections')
            ->$metodo('notices')
            ->$metodo('logs');
    }
    public function search($query, $search)
    {
        return $query->where(function ($query) use ($search){
            $search = trim($search);
            $search = Str::upper($search);

            //Filtros trans
            $filteredLogs = array_filter(trans('data.logs.literales'), function($value) use ($search) {return str_contains($value, $search);});
            $indicesLogs = array_keys($filteredLogs);

            $filteredNotices = array_filter(trans('data.notices.literales'), function($value) use ($search) {return str_contains($value, $search);});
            $indicesNotices = array_keys($filteredNotices);

            $filteredSensor = array_filter(trans('data.sensor.literales'), function($value) use ($search) { return str_contains($value, $search);});
            $indicesSensor = array_keys($filteredSensor);


            return $query->orWhere('contenido_peticion', 'like', "%$search%")
                ->orWhere('id', $search)
                ->orWhereHas('entries', $this->subQuery($search, 'tipo'))
                ->orWhereHas('entries', $this->subQuery($search, 'modo'))
                ->orWhereHas('detections', $this->subQuery($search, 'modo_deteccion'))
                ->orWhereHas('detections.sensor', $this->subQueryIn($indicesSensor, 'tipo'))
                ->orWhereHas('notices', $this->subQuery($search, 'tipo'))
                ->orWhereHas('notices', $this->subQuery($search, 'cuerpo'))
                ->orWhereHas('notices', $this->subQueryIn($indicesNotices, 'asunto'))
                ->orWhereHas('logs', $this->subQueryIn($indicesLogs, 'descripcion'))
                ;
        });
    }


}
