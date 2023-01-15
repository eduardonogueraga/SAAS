<?php

namespace App\Http\Requests;

use App\Models\Entry;
use App\Models\Package;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreatePackageRequest extends FormRequest
{

    public bool $error = false;
    public bool $responseOk = false;
    public $installLog = [];

    public $currentEntry;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function createNewPackage() :bool
    {

        //$this->installLog["error"] = false;

        $paqueteJSON = json_decode($this->getContent());

        $package = new Package([
            'contenido_peticion' => json_encode($paqueteJSON),
            'intentos' => $paqueteJSON->retry,
            'saa_version' => $paqueteJSON->version,
            'fecha' =>  $paqueteJSON->date,
        ]);

        if (!$package->save()) {
            $this->error = true;
        }


        //Instalar elementos del paquete
        if(!$this->error) {

            //Comprobamos si la entrada es nueva, sino es nueva se obvia y se comprueban sus elementos
            foreach ($paqueteJSON->Entry as $entry) {
                //Recorremos el array de entradas


                if ($entry->isnew) {
                    //Creamos la entrada
                    $entryField = explode('|', $entry->reg);

                    $this->currentEntry = $package->entries()->create([
                        'tipo' => ($entryField[0])? 'activacion':'desactivacion',
                        'modo' => ($entryField[1])? 'automatica':'manual',
                        'restaurada' => ($entryField[2]),
                        'intentos_reactivacion' => ($entryField[3]),
                        'fecha' =>  $entry->date,
                    ]);

                } else {
                    $this->currentEntry =  Entry::latest()->first();
                }

                //Recorremos los elementos de las entradas

                if (data_get($entry, 'Detection')){ //Comprobamos si existen detecciones

                    foreach ($entry->Detection as $detection) {

                        $detectionSensorField = explode('|', $detection->reg);

                        DB::transaction(function ()  use ($package,$detection, $detectionSensorField){

                            $detection =  $this->currentEntry->detections()->create([
                                'package_id' => $package->id,
                                'intrusismo' => ($detectionSensorField[0]),
                                'umbral' => ($detectionSensorField[1]),
                                'restaurado' => ($detectionSensorField[2]),
                                'modo_deteccion' => ($detectionSensorField[3]) ? "normal":"phantom",
                                'fecha' => $detection->date,
                            ]);

                            $detection->sensor()->create([
                                'package_id' => $package->id,
                                'tipo' => ($detectionSensorField[4]),
                                'estado' =>  ($detectionSensorField[5])?"ONLINE":"OFFLINE",
                                'valor_sensor' => ($detectionSensorField[6]),
                            ]);

                        });
                        $this->currentEntry->update(['updated_at' => now()]);

                    } //Fin bucle detecciones
                }

                if (data_get($entry, 'Notice')){ //Comprobamos si existen notificaciones

                    foreach ($entry->Notice as $notice) {

                        $noticeField = explode('|', $notice->reg);

                        $this->currentEntry->notices()->create([
                            'package_id' => $package->id,
                            'tipo' => ($noticeField[0])?"sms":"llamada",
                            'asunto' => ($noticeField[1]),
                            'cuerpo' => ($noticeField[2]),
                            'telefono' => ($noticeField[3]), //Pendiente de alias
                            'fecha' => $notice->date
                        ]);

                        $this->currentEntry->update(['updated_at' => now()]);
                    } //Fin bucle notificaciones
                }

                if (data_get($entry, 'Log')){ //Comprobamos si existen logs

                    foreach ($entry->Log as $log) {

                        $this->currentEntry->logs()->create([
                            'package_id' => $package->id,
                            'descripcion' =>  $log->reg,
                            'fecha' => $log->date,
                        ]);
                        $this->currentEntry->update(['updated_at' => now()]);
                    } //Fin bucle logs
                }

            } //Fin bucle entradas


            //Si el paquete viene vacio se actualiza el campo instalado a Ok

            //Cae en error y no llega WIP
            $package->update([
                'implantado' => 1,
            ]);

            $this->responseOk = true;
        }

        return $this->responseOk;
    }
}
