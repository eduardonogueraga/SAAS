<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\FilterTrait;
use App\Http\Livewire\shared\ModalTrait;
use App\Models\Package;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ShowHistory extends Component
{
   use ModalTrait;
    use FilterTrait;
    public $paginate = 2;
    private $history;
    public $search;
    private $searchDataCount;
    public $modalTypeId; //Id del switch
    private $modalContent;
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function mount()
    {
        $this->queryString = array_merge($this->queryString, $this->filterQueryString);
    }

    public function loadMorePackages()
    {
        $this->paginate += 2;
    }

    public function openDataModalWithData($datos, $id)
    {
        $data = json_decode($datos);

        $data->fecha = Carbon::parse($data->fecha);
        $data->created_at = Carbon::parse($data->created_at);
        $data->updated_at = Carbon::parse($data->updated_at);

        $this->dataModal = true;

        $this->modalTypeId = $id;
        $this->modalContent =  $data;
    }

    public function render()
    {
        $filters = [
            'search' => $this->search,
            'filtroPackageImplantado' => $this->filtroPackageImplantado,
        ];

        $this->history = Package::query()
            ->with('entries', 'detections','detections.sensor','notices', 'logs')
            ->applyFilters($filters)
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        $this->searchDataCount = Package::query()
            ->with('entries', 'detections','detections.sensor','notices', 'logs')
            ->applyFilters($filters)
            ->count();

        return view('livewire.show-history', [
            'history' => $this->history,
            'dataCount' => $this->searchDataCount,
            'modalContent' => $this->modalContent]);
    }
}
