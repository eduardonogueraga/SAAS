<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\FilterTrait;
use App\Models\Entry;
use Livewire\Component;

class EntryManageSidebar extends Component
{
    use FilterTrait;
    public $paginate = 10;

    public $select;
    public $search;


    protected $queryString = [
        'search' => ['except' => ''],
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
            'search' => $this->search,
            'filtroEntryModo' => $this->filtroEntryModo,
            'filtroEntryEstado' => $this->filtroEntryEstado,
            'filtroEntryTipo' => $this->filtroEntryTipo,
            'dateFrom' => $this->dateFrom,
            'dateTo' => $this->dateTo,
        ];

        $entries = Entry::query()
            ->with('notices')
            ->applyFilters($filters)
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.entry-manage-sidebar', ['entries' => $entries]);
    }
}
