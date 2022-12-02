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
        'orderSelected' => 'orderSelected'

    ];

    public function orderSelected($id){
        $this->select = $id;
    }
    public function loadMore()
    {
        $this->paginate += 10;
    }
    public function render()
    {
        $entries = Entry::query()
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.entry-manage-sidebar', ['entries' => $entries]);
    }
}
