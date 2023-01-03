<?php

namespace App\Http\Livewire\shared;

trait ModalTrait
{
    public $selectedRegister;
    public $dataModal;

    public function openDataModal($id)
    {
        $this->selectedRegister = $id;
        $this->dataModal = true;
    }

    public function closeDataModal()
    {
        $this->selectedRegister = null;
        $this->dataModal = false;
    }

    public function redirectToEntryPanel($id)
    {
        return redirect()->route('panel.show', ['entry' => $id]);
    }
}
