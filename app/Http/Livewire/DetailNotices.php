<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\ModalTrait;
use App\Models\Entry;
use App\Models\Notice;
use Livewire\Component;

class DetailNotices extends Component
{
    use ModalTrait;

    public Entry $entry;
    private $noticeLists;
    public int $entryId;
    public $paginate = 10;

    protected $listeners = [
        'entrySelected' => 'setEntryId',
        'loadMoreNotices' => 'loadMoreNotices',
    ];

    public function loadMoreNotices()
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

        $this->noticeLists = Notice::query()
            ->whereEntry_id($this->entryId)
            ->orderBy('fecha', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.detail-notices', ['noticeLists' => $this->noticeLists]);
    }
}
