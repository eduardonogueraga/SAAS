<?php

namespace App\Http\Livewire;

use App\Models\Detection;
use App\Models\Entry;
use Livewire\Component;

class EntryManageDetails extends Component
{
    public Entry $entry;
    private $detectionsList;

    public $paginate = 5;
    public $previousDatetime;
    public int $entryId;

    protected $listeners = [
        'entrySelected' => 'setEntryId',
        'loadMoreDetections' => 'loadMoreDetections'
    ];

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

        if(empty($this->entryId)){
           $this->entryId = Entry::max('id');
        }

        $this->entry = Entry::query()
            ->withCount('notices', 'logs', 'detections')
            ->whereId($this->entryId)
            ->first();

        $this->detectionsList = Detection::query()
            ->with('sensor')
            ->whereEntry_id($this->entryId)
            ->orderBy('fecha', 'DESC')
            ->paginate($this->paginate);

        $this->previousDatetime = Entry::select('fecha')
        ->whereId($this->entryId +1)
        ->first();

        return view('livewire.entry-manage-details', ['detectionsList' => $this->detectionsList]);
    }
}
