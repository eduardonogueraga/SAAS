<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\Component;

class ShowHistory extends Component
{

    private $history;

    public function render()
    {
        $this->history = Package::query()
            ->with('entries', 'detections','detections.sensor','notices')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        return view('livewire.show-history', ['history' => $this->history]);
    }
}
