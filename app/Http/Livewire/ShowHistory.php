<?php

namespace App\Http\Livewire;

use App\Http\Controllers\CargaElementosPaginacion;
use App\Http\Livewire\shared\ModalTrait;
use App\Models\Package;
use Livewire\Component;

class ShowHistory extends Component
{
   use ModalTrait;
    public $paginate = 2;
    private $history;

    public function loadMorePackages()
    {
        $this->paginate += 2;
    }

    public function render()
    {
        $this->history = Package::query()
            ->with('entries', 'detections','detections.sensor','notices')
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.show-history', ['history' => $this->history]);
    }
}
