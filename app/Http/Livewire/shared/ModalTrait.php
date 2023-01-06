<?php

namespace App\Http\Livewire\shared;

use Illuminate\Database\Eloquent\Model;


trait ModalTrait
{
    public $selectedRegister;
    public $dataModal; //Id del registro

    public $modalTypeId; //Id del switch
    public $modalContent;

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

    public function openDataModalWithData(Model $datos, $id)
    {
        $this->dataModal = true;
        //hacer aqui la llamada?  = cutre
        dd($datos);
        $this->modalTypeId = $id;
        $this->modalContent = (object)$datos;
    }

    public function redirectToEntryPanel($id)
    {
        return redirect()->route('panel.show', ['entry' => $id]);
    }
}
