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
    public $filtroDetectionSensor;
    public $filtroNoticeTipo;
    public $filtroPackageImplantado;
    public $filtroPackageContenido;
    public $filtroApplogsTipo;
    public $filtroApplogsError;
    public $filtroSystemNoticesTipo;
    public $filtroSystemNoticesEstado;
    public $sensorTypes;
    public $dateFrom;
    public $dateTo;
    public $filterQueryString = [
        'filtroEntryModo'  => ['except' => ''],
        'filtroEntryEstado'  => ['except' => ''],
        'filtroEntryTipo' => ['except' => ''],
        'filtroDetectionModo'  => ['except' => ''],
        'filtroDetectionIntrusismo'  => ['except' => ''],
        'filtroDetectionEstado'  => ['except' => ''],
        'filtroDetectionSensor' => ['except' => ''],
        'filtroNoticeTipo' => ['except' => ''],
        'filtroPackageImplantado' => ['except' => ''],
        'filtroPackageContenido' => ['except' => ''],
        'filtroApplogsTipo' => ['except' => ''],
        'filtroApplogsError' => ['except' => ''],
        'filtroSystemNoticesTipo'  => ['except' => ''],
        'filtroSystemNoticesEstado' => ['except' => ''],
        'dateFrom' => ['except' => ''],
        'dateTo' => ['except' => ''],
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
