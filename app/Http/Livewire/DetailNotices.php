<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use App\Models\Notice;
use Livewire\Component;

class DetailNotices extends Component
{
    public Entry $entry;
    private $noticeLists;
    public int $entryId;

    public $paginate = 5;

    public $selectedNotice;
    public $noticeModal;
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

    public function openNoticeModal($id)
    {
        $this->selectedNotice = $id;
        $this->noticeModal = true;
    }

    public function closeNoticeModal()
    {
        $this->selectedProduct = null;
        $this->noticeModal = false;
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
