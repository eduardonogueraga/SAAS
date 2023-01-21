<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\FilterTrait;
use App\Http\Livewire\shared\ModalTrait;
use App\Models\Detection;
use App\Models\Entry;
use App\Models\Literal;
use Livewire\Component;

class EntryManageDetails extends Component
{
    use ModalTrait;
    use FilterTrait;
    public  $entry;
    private $detectionsList;

    public $paginate = 5;
    public $previousDatetime;
    public int $entryId;

    public $search;

    protected $listeners = [
        'entrySelected' => 'setEntryId',
        'loadMoreDetections' => 'loadMoreDetections'
    ];

    protected $queryString = [
        'search' => ['except' => ''],
    ];
    public function mount()
    {
        $this->queryString = array_merge($this->queryString, $this->filterQueryString);
        $this->sensorTypes = Literal::query()->whereTabla('sensors')->orderBy('id')->pluck('literal','codigo');
    }
    public function loadMoreDetections()
    {
        $this->paginate += 5;
    }
    public function setEntryId($id)
    {
        $this->reset('paginate');
        $this->entryId = $id;
    }

    public function render()
    {
        $filters = [
            'search' => $this->search
        ];

        $filters = array_merge($filters, [
            'filtroDetectionModo' => $this->filtroDetectionModo,
            'filtroDetectionIntrusismo' => $this->filtroDetectionIntrusismo,
            'filtroDetectionEstado' => $this->filtroDetectionEstado,
            'filtroDetectionSensor' => $this->filtroDetectionSensor,
        ]);

        if(empty($this->entryId)){
            $this->entryId = 1;

            $maxEntryId = Entry::max('id');

            if($maxEntryId !== null){$this->entryId = $maxEntryId;}
        }

        $this->entry = Entry::query()
            ->withCount('notices', 'logs','detections','package')
            ->whereId($this->entryId)
            ->first();

        $this->detectionsList = Detection::query()
            ->with('sensor')
            ->whereEntry_id($this->entryId)
            ->applyFilters($filters)
            ->orderBy('fecha', 'DESC')
            ->paginate($this->paginate);

        $this->previousDatetime = Entry::select('fecha')
        ->whereId($this->entryId +1)
        ->first();

        return view('livewire.entry-manage-details', ['detectionsList' => $this->detectionsList]);
    }
}
