<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\FilterTrait;
use App\Http\Livewire\shared\ModalTrait;
use App\Models\Package;
use Illuminate\Database\Eloquent\Model;
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

    public function openDataModalWithData(Package $datos,  $id, $index = null)
    {
        $this->dataModal = true;
        $this->modalTypeId = $id;

        if($id < 4 && $id >= 0){
            $modelRelations= ['detections', 'entries', 'notices','logs'];
            $relation = $modelRelations[$id];

            $this->modalContent =  $datos->$relation[$index];
        } else {
            $this->modalContent =  $datos;
        }

    }


    public function render()
    {
        $filters = [
            'search' => $this->search,
            'filtroPackageImplantado' => $this->filtroPackageImplantado,
            'filtroPackageContenido' => $this->filtroPackageContenido,
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo,
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
