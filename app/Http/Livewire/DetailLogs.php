<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\ModalTrait;
use App\Models\Entry;
use App\Models\Log;
use Livewire\Component;

class DetailLogs extends Component
{
    use ModalTrait;
    public Entry $entry;
    private $logsLists;
    public int $entryId;

    public $paginate = 10;
    protected $listeners = [
        'entrySelected' => 'setEntryId',
        'loadMoreLog' => 'loadMoreLog'
    ];

    public function loadMoreLog()
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

        $this->logsLists = Log::query()
            ->whereEntry_id($this->entryId)
            ->orderBy('fecha', 'DESC')
            ->paginate($this->paginate);


        return view('livewire.detail-logs', ['logsLists' => $this->logsLists]);
    }
}
