<?php

namespace App\Http\Controllers;

trait CargaElementosPaginacion
{
    public $paginate;
    public int $entryId;

    public function loadMoreElements()
    {
        $this->paginate += 5;
    }

    public function setEntryId($id)
    {
        $this->reset('paginate');
        $this->entryId = $id;
    }

}
