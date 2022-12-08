<?php

namespace App\Http\Livewire;

use App\Models\Entry;
use Livewire\Component;

class EntryManageSidebar extends Component
{

    public $paginate = 15;

    public $select;
    public $search;

    protected $queryString = [
        'search' => ['except' => '']
    ];
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
        $filters = [
            'search' => $this->search
        ];

        $entries = Entry::query()
            ->with('notices')
            ->applyFilters($filters)
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.entry-manage-sidebar', ['entries' => $entries]);
    }
}
