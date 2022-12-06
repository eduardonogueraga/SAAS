<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;

class EntryManageDetails extends Component
{
    public Entry $entry;

    public $previousDatetime;
    public int $entryId;

    protected $listeners = [
        'entrySelected' => 'setEntryId'
    ];

    public function setEntryId($id)
    {
        $this->entryId = $id;
    }

    public function render()
    {

        if(empty($this->entryId)){
           $this->entryId = Entry::max('id');
        }

        $this->entry = Entry::query()
            ->with('detections','detections.sensor')
            ->withCount('notices', 'logs')
            ->whereId($this->entryId)
            ->first();

        $this->previousDatetime = Entry::select('fecha')
        ->whereId($this->entryId +1)
        ->first();

        return view('livewire.entry-manage-details');
    }
}
