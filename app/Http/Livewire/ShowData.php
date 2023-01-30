<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\FilterTrait;
use App\Http\Livewire\shared\ModalTrait;
use App\Models\Applogs;
use App\Models\DataQuery;
use App\Models\Detection;
use App\Models\Entry;
use App\Models\Literal;
use App\Models\Log;
use App\Models\Notice;
use App\Models\Package;
use App\Models\System;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class ShowData extends Component
{
use ModalTrait;
use FilterTrait;
    public $paginate = 15;
    public int $dataRadio = 0;
    private $data;
    private $searchDataCount;
    private $infoRegistros;
    private $systemSensores;
    public $search;


    public function loadMoreData()
    {
        $this->paginate += 5;
    }

    public function clearList()
    {
        $this->reset('paginate');
        $this->render();
    }

    protected $queryString = [
        'dataRadio' => ['integer'],
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->queryString = array_merge($this->queryString, $this->filterQueryString);
        $this->sensorTypes = trans('data.sensor.literales');
    }


    public function render()
    {
        $filters = [
            'search' => $this->search
        ];


        $this->infoRegistros = DB::select('SELECT
            (SELECT COUNT(*) FROM entries) AS num_entries,
            (SELECT COUNT(*) FROM detections) AS num_detections,
            (SELECT COUNT(*) FROM notices) AS num_notices,
            (SELECT COUNT(*) FROM packages) AS num_packages,
            (SELECT COUNT(*) FROM logs) AS num_logs,
            (SELECT COUNT(*) FROM applogs) AS num_applogs');

        switch ($this->dataRadio) {
            case 0:
                $filters = array_merge($filters, [
                    'filtroEntryModo' => $this->filtroEntryModo,
                    'filtroEntryEstado' => $this->filtroEntryEstado,
                    'filtroEntryTipo' => $this->filtroEntryTipo,
                ]);

                $this->data = Entry::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Entry::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            case 1:
                $filters = array_merge($filters, [
                    'filtroDetectionModo' => $this->filtroDetectionModo,
                    'filtroDetectionIntrusismo' => $this->filtroDetectionIntrusismo,
                    'filtroDetectionEstado' => $this->filtroDetectionEstado,
                    'filtroDetectionSensor' => $this->filtroDetectionSensor,
                ]);

                $this->data = Detection::query()
                    ->with('sensor')
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Detection::query()
                    ->with('sensor')
                    ->applyFilters($filters)
                    ->count();
                break;

            case 2:

                $filters = array_merge($filters, [
                    'filtroNoticeTipo' => $this->filtroNoticeTipo,
                ]);
                $this->data = Notice::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Notice::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            case 3:
                $this->data = Log::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Log::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            case 4:
                $filters = array_merge($filters, [
                    'filtroPackageImplantado' => $this->filtroPackageImplantado,
                    'filtroPackageContenido' => $this->filtroPackageContenido,
                ]);

                $this->data = Package::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Package::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            case 5:
                $this->data = System::query()->orderBy('id', 'DESC')->paginate(1);
                $this->searchDataCount = 1;

                if($this->data[0] !== null){ //Si no hay filas no se procesa nada
                    $this->systemSensores = explode('|', $this->data[0]->SENSORES_HABLITADOS);

                    $tempArr = [];
                    foreach ($this->systemSensores as $value) {
                        $parts = explode(";", $value);
                        $tempArr[$parts[0]] = $parts[1];
                    }

                    $this->systemSensores = $tempArr;
                }


                break;
            case 6:
                $filters = array_merge($filters, [
                    'filtroApplogsTipo' => $this->filtroApplogsTipo,
                    'filtroApplogsError' => $this->filtroApplogsError,
                ]);

                $this->data = Applogs::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Applogs::query()
                    ->applyFilters($filters)
                    ->count();
                break;
            default:

                $filters = array_merge($filters, [
                    'filtroEntryModo' => $this->filtroEntryModo,
                    'filtroEntryEstado' => $this->filtroEntryEstado,
                ]);

                $this->data = Entry::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Entry::query()
                    ->applyFilters($filters)
                    ->count();
        }

        return view('livewire.show-data', ['data' => $this->data,
            'infoRegistros' => $this->infoRegistros,
            'systemSensores' => $this->systemSensores,
            'dataCount' => $this->searchDataCount]);

    }
}
