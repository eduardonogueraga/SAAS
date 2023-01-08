<?php

namespace App\Http\Livewire\shared;

trait FilterTrait
{
    public $filtroEntryModo;
    public $filtroEntryEstado;
    public $filtroEntryTipo;
    public $filtroDetectionModo;
    public $filtroDetectionIntrusismo;
    public $filtroDetectionEstado;
    public $filtroNoticeTipo;
    public $filtroPackageImplantado;

    public $filterQueryString = [
        'filtroEntryModo'  => ['except' => ''],
        'filtroEntryEstado'  => ['except' => ''],
        'filtroEntryTipo' => ['except' => ''],
        'filtroDetectionModo'  => ['except' => ''],
        'filtroDetectionIntrusismo'  => ['except' => ''],
        'filtroDetectionEstado'  => ['except' => ''],
        'filtroNoticeTipo' => ['except' => ''],
        'filtroPackageImplantado' => ['except' => ''],
    ];

    public function clearFilters($filtro)
    {
        foreach ($filtro as $value) {
            $this->reset($value);
        }
        $this->reset('search');

        $this->render();
    }


}
