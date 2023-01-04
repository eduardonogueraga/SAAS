<?php

namespace App\Http\Livewire;

use App\Http\Livewire\shared\ModalTrait;
use App\Models\DataQuery;
use App\Models\Detection;
use App\Models\Entry;
use App\Models\Log;
use App\Models\Notice;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class ShowData extends Component
{
use ModalTrait;
    public $paginate = 15;
    public int $dataRadio = 0;
    private $data;
    private $searchDataCount;
    private $infoRegistros;
    public $search;

    public function loadMoreData()
    {
        $this->paginate += 5;
    }

    public function clearList()
    {
        $this->reset('paginate');
        $this->render();
    }

    protected $queryString = [
        'dataRadio' => ['integer'],
        'search' => ['except' => ''],
    ];

    public function render()
    {
        $filters = [
            'search' => $this->search
        ];

        $this->infoRegistros = DB::select('SELECT
            (SELECT COUNT(*) FROM entries) AS num_entries,
            (SELECT COUNT(*) FROM detections) AS num_detections,
            (SELECT COUNT(*) FROM notices) AS num_notices,
            (SELECT COUNT(*) FROM packages) AS num_packages,
            (SELECT COUNT(*) FROM logs) AS num_logs');

        switch ($this->dataRadio) {
            case 0:
                $this->data = Entry::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Entry::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            case 1:
                $this->data = Detection::query()
                    ->with('sensor')
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Detection::query()
                    ->with('sensor')
                    ->applyFilters($filters)
                    ->count();
                break;

            case 2:
                $this->data = Notice::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Notice::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            case 3:
                $this->data = Log::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Log::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            case 4:
                $this->data = Package::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Package::query()
                    ->applyFilters($filters)
                    ->count();
                break;

            default:
                $this->data = Entry::query()
                    ->applyFilters($filters)
                    ->orderBy('id', 'DESC')
                    ->paginate($this->paginate);

                $this->searchDataCount = Entry::query()
                    ->applyFilters($filters)
                    ->count();
        }

        return view('livewire.show-data', ['data' => $this->data,
            'infoRegistros' => $this->infoRegistros,
            'dataCount' => $this->searchDataCount]);

    }
}
