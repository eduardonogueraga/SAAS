<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\FilterTrait;
use App\Http\Livewire\shared\ModalTrait;
use App\Models\Alarm;
use App\Models\Applogs;
use App\Models\Package;
use App\Models\SystemNotice;
use Carbon\Carbon;
use Livewire\Component;

class AlarmManage extends Component
{

    use ModalTrait;
    use FilterTrait;
    private $data;
    private $alarmSettings;
    public $paginate = 15;

    public $alarmStatus;
    public $noticeStatus;
    public $frecuenyTime;
    public $numIntentos;
    public $search;
    public $searchDataCount;

    protected $queryString = [
        'search' => ['except' => ''],
    ];
    public function loadMoreData()
    {
        $this->paginate += 5;
    }

    public function mount()
    {
        $this->alarmSettings = Alarm::query()->firstOrFail();
        $this->alarmStatus = $this->alarmSettings->activa;
        $this->noticeStatus = $this->alarmSettings->notificaciones;
        $this->frecuenyTime = $this->alarmSettings->periodo;
        $this->numIntentos = $this->alarmSettings->max_intentos;
    }

    public function submit()

    {
        $this->alarmSettings = Alarm::query()->firstOrFail();
        $ultimoPaqueteIntalado = Package::max('id');

        $appLog = Applogs::create(['tipo' => 'alarm',]);
        $desc =  'Alarma ' .(($this->alarmStatus)? 'activada': 'desactivada') . ', Tiempo:' . $this->frecuenyTime .
            ' Min, Intentos: ' . $this->numIntentos . ', Notificaciones ' . (($this->noticeStatus)? 'ON ': 'OFF');

        $appLog->update(['desc' => $desc]);

        $this->alarmSettings->update([
            'activa' => $this->alarmStatus,
            'notificaciones' => $this->noticeStatus,
            'periodo' => $this->frecuenyTime,
            'max_intentos' => $this->numIntentos,
            'last_package_id' => $ultimoPaqueteIntalado,
        ]);

        if($this->noticeStatus){ //Si quedan notificaciones viejas pendientes se marcan como procesadas
            $oneHourAgo = Carbon::now()->subHour();
            SystemNotice::query()->where('procesado', 0)
                ->where('created_at', '<', $oneHourAgo)
                ->update(['procesado' => 1]);
        }
    }
    public function render()
    {
        $filters = [
            'search' => $this->search
        ];

        $filters = array_merge($filters, [
            'filtroApplogsTipo' => $this->filtroApplogsTipo,
            'filtroApplogsError' => $this->filtroApplogsError,
        ]);

        $this->alarmSettings = Alarm::query()->firstOrFail();

        $this->data = Applogs::query()
            ->whereTipo('alarm')
            ->applyFilters($filters)
            ->orderBy('created_at', 'DESC')
            ->paginate($this->paginate);

        $this->searchDataCount = Applogs::query()
            ->whereTipo('alarm')
            ->applyFilters($filters)
            ->count();


        return view('livewire.alarm-manage', ['data' => $this->data,
            'alarmSettings' => $this->alarmSettings,
            'dataCount' => $this->searchDataCount]);
    }
}
