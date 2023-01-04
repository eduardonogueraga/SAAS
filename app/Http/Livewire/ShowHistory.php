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
    public $search;
    private $searchDataCount;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function loadMorePackages()
    {
        $this->paginate += 2;
    }

    public function render()
    {
        $filters = [
            'search' => $this->search
        ];

        $this->history = Package::query()
            ->with('entries', 'detections','detections.sensor','notices')
            ->applyFilters($filters)
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        $this->searchDataCount = Package::query()
            ->with('entries', 'detections','detections.sensor','notices')
            ->applyFilters($filters)
            ->count();

        return view('livewire.show-history', [
            'history' => $this->history,
            'dataCount' => $this->searchDataCount]);
    }
}
