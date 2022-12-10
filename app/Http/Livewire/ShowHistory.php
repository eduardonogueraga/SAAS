<?php

namespace App\Http\Livewire;

use App\Models\Package;
use Livewire\Component;

class ShowHistory extends Component
{

    private $history;

    public $currentPackage;
    public function render()
    {
        $this->history = Package::query()
            ->with('entries', 'detections','detections.sensor','notices')
            ->orderBy('id', 'DESC')
            ->paginate(10);

        dd($this->history[0]->detections[0]->id);

        /*
        $this->history = Package::query()
            ->select('packages.id as p_id',
                'e.id as e_id', 'e.tipo as e_tipo', 'e.modo as e_modo', 'e.restaurada as e_restaurada', 'e.intentos_reactivacion as e_intentos_reactivacion', 'e.saa_version as e_saa_version', 'e.fecha as e_fecha', 'e.created_at as e_created_at',
                'd.id as d_id', 'd.intrusismo as d_intrusismo', 'd.umbral as d_umbral', 'd.restaurado as d_restaurado', 'd.modo_deteccion as d_modo_deteccion', 'd.fecha as d_fecha', 'd.created_at as d_created_at',
                'n.id as n_id', 'n.tipo as n_tipo', 'n.asunto as n_asunto', 'n.cuerpo as n_cuerpo', 'n.telefono as n_telefono', 'n.fecha as n_fecha', 'n.created_at as n_created_at',
                's.tipo as s_tipo', 's.estado as s_estado', 's.valor_sensor as s_valor_sensor')
            ->leftJoin('entries as e', 'packages.id', '=', 'e.package_id')
            ->leftJoin('detections as d', 'packages.id', '=', 'd.package_id')
            ->leftJoin('sensors as s', 'd.id', '=', 's.detection_id')
            ->leftJoin('notices as n', 'packages.id', '=', 'n.package_id')
            ->orderBy('packages.id', 'ASC')
            ->paginate(50);
        */
        return view('livewire.show-history', ['history' => $this->history]);
    }
}
