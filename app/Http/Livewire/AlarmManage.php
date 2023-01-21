<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\ModalTrait;
use App\Models\Alarm;
use App\Models\Applogs;
use Livewire\Component;

class AlarmManage extends Component
{

    use ModalTrait;
    private $data;
    private $alarmSettings;
    public $paginate = 15;

    public $alarmStatus;
    public $noticeStatus;
    public $frecuenyTime;
    public $numIntentos;


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

        $this->alarmSettings->update([
            'activa' => $this->alarmStatus,
            'notificaciones' => $this->noticeStatus,
            'periodo' => $this->frecuenyTime,
            'max_intentos' => $this->numIntentos,
        ]);
    }
    public function render()
    {
        $this->alarmSettings = Alarm::query()->firstOrFail();

        $this->data = Applogs::query()
            ->whereTipo('alarm')
            ->orderBy('created_at', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.alarm-manage', ['data' => $this->data, 'alarmSettings' => $this->alarmSettings]);
    }
}
