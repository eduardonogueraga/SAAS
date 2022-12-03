<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;

class EntryManageDetails extends Component
{
    public Entry $entry;
    public int $entryId = 30;

    protected $listeners = [
        'entrySelected' => 'setEntryId'
    ];

    public function setEntryId($id)
    {
        $this->entryId = $id;
    }

    public function render()
    {
        $this->entry = Entry::query()
            ->with('detections','detections.sensor','notices')
            ->whereId($this->entryId)
            ->first();

        return view('livewire.entry-manage-details');
    }
}
