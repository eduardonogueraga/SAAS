<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;

class EntryManageSidebar extends Component
{

    public $paginate = 10;

    public $select;

    protected $listeners = [
        'loadMore' => 'loadMore',
        'entrySelected' => 'entrySelected'

    ];

    public function entrySelected($id){
        $this->select = $id;
    }
    public function loadMore()
    {
        $this->paginate += 10;
    }
    public function render()
    {
        $entries = Entry::query()
            ->with('notices')
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.entry-manage-sidebar', ['entries' => $entries]);
    }
}
