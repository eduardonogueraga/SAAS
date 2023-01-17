<?php

namespace App\Http\Requests;

use App\Models\Entry;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CreatePackageRequest extends FormRequest
{

    public bool $error = false;
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

    public function createNewPackage()
    {

        $paqueteJSON = json_decode($this->getContent());

        //Comprobar que el JSON no viene vacio
        if($paqueteJSON === null){
            //En el caso de problemas con el formato debera crearse el paquete junto con los datos de la peticion
            $package = new Package([
                'contenido_peticion' => $this->getContent(),
                'respuesta_http' => '400 Formato de erroneo',
                'error' => 'Formato de erroneo en JSON no se puede instalar el paquete',
                'fecha' => Carbon::now()->format('Y-m-d'),
            ]);

            if (!$package->save()) {
                return response()->json(['error' => 'Error al crear el paquete con formato erroneo'], 400);
            }

            return response()->json(['error' => 'Formato de erroneo'], 400);
        }

        //Si tiene formato JSON procedemos con la creacion del paquete
        try {
            try {

                //Comprobar que no se encuentra ya instalado (ID)

                //...

                //Si el formato es el adecuado creamos el paquete
                $package =  Package::create([
                    'contenido_peticion' => json_encode($paqueteJSON),
                    'intentos' => $paqueteJSON->retry,
                    'saa_version' => $paqueteJSON->version,
                    'fecha' =>  $paqueteJSON->date,
                ]);

            } catch (QueryException $e) {
                return response()->json(['error' => 'Error al crear el paquete'], 400);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error creando el paquete'], 500);
        }

        //Instalar elementos del paquete
        return $this->insertarContenidoPaquete($paqueteJSON, $package);
    }

    /**
     * @param mixed $paqueteJSON
     * @param Package $package
     * @return JsonResponse
     */
    public function insertarContenidoPaquete(mixed $paqueteJSON, Package $package): JsonResponse
    {

        //Comprobamos que existe al menos una entrada
        if(data_get($paqueteJSON, 'Entry') === null){
            return response()->json(['error' => 'No hay entrada'], 400);
        }

        //Comprobamos si la entrada es nueva, sino es nueva se obvia y se comprueban sus elementos
        foreach ($paqueteJSON->Entry as $entry) {  //Recorremos el array de entradas

            if ($entry->isnew) {

                try {
                    //Creamos la entrada
                    $entryField = explode('|', $entry->reg);

                    $this->currentEntry = $package->entries()->create([
                        'tipo' => ($entryField[0]) ? 'activacion' : 'desactivacion',
                        'modo' => ($entryField[1]) ? 'automatica' : 'manual',
                        'restaurada' => ($entryField[2]),
                        'intentos_reactivacion' => ($entryField[3]),
                        'fecha' => $entry->date,
                    ]);

                } catch (QueryException $e) {
                    // Código que se ejecuta si se produce una excepción de tipo QueryException
                    $package->update(['respuesta_http' => '400 Error insertando entrada', 'error' => $e->getMessage(),]);
                    return response()->json(['error' => 'Error insertando entrada'], 400);

                } catch (\Exception $e) {
                    // Código que se ejecuta si se produce cualquier otra excepción
                    $package->update(['respuesta_http' => '500 Error creando entrada', 'error' => $e->getMessage(),]);
                    return response()->json(['error' => 'Error inesperado'], 500);
                }

            } else {
                //Si la entrada no es nueva buscaremos la actual
                try {

                    $this->currentEntry = Entry::latest()->firstOrFail();

                } catch (ModelNotFoundException $e) {

                    $package->update(['respuesta_http' => '404 Error buscando la entrada mas reciente', 'error' => $e->getMessage(),]);
                    return response()->json(['error' => 'Entrada no encontrada'], 404);

                } catch (\Exception $e) {

                    $package->update(['respuesta_http' => '500 Error buscando la entrada mas reciente', 'error' => $e->getMessage(),]);
                    return response()->json(['error' => 'Error inesperado'], 500);
                }

            }

            //Recorremos los elementos de las entradas
            if (data_get($entry, 'Detection')) { //Comprobamos si existen detecciones

                foreach ($entry->Detection as $detection) {

                    try {
                        $detectionSensorField = explode('|', $detection->reg);
                        try {
                            DB::transaction(function () use ($package, $detection, $detectionSensorField) {

                                $detection = $this->currentEntry->detections()->create([
                                    'package_id' => $package->id,
                                    'intrusismo' => ($detectionSensorField[0]),
                                    'umbral' => ($detectionSensorField[1]),
                                    'restaurado' => ($detectionSensorField[2]),
                                    'modo_deteccion' => ($detectionSensorField[3]) ? "normal" : "phantom",
                                    'fecha' => $detection->date,
                                ]);

                                $detection->sensor()->create([
                                    'package_id' => $package->id,
                                    'tipo' => ($detectionSensorField[4]),
                                    'estado' => ($detectionSensorField[5]) ? "ONLINE" : "OFFLINE",
                                    'valor_sensor' => ($detectionSensorField[6]),
                                ]);

                            });

                            $this->currentEntry->update(['updated_at' => now()]);

                        } catch (QueryException $e) {

                            $package->update(['respuesta_http' => '400 Error creando deteccion', 'error' => $e->getMessage(),]);
                            return response()->json(['error' => 'Error creando deteccion'], 400);

                        }

                    } catch (\Exception $e) {

                        $package->update(['respuesta_http' => '500 Error creando deteccion', 'error' => $e->getMessage(),]);
                        return response()->json(['error' => 'Error creando deteccion'], 500);
                    }

                } //Fin bucle detecciones
            }

            if (data_get($entry, 'Notice')) { //Comprobamos si existen notificaciones

                foreach ($entry->Notice as $notice) {

                    try {
                        $noticeField = explode('|', $notice->reg);

                        try {
                            $this->currentEntry->notices()->create([
                                'package_id' => $package->id,
                                'tipo' => ($noticeField[0]) ? "sms" : "llamada",
                                'asunto' => ($noticeField[1]),
                                'cuerpo' => ($noticeField[2]),
                                'telefono' => ($noticeField[3]), //Pendiente de alias
                                'fecha' => $notice->date
                            ]);

                            $this->currentEntry->update(['updated_at' => now()]);

                        } catch (QueryException $e) {

                            $package->update(['respuesta_http' => '400 Error creando notificacion', 'error' => $e->getMessage(),]);
                            return response()->json(['error' => 'Error creando notificacion'], 400);

                        }

                    } catch (\Exception $e) {

                        $package->update(['respuesta_http' => '500 Error creando notificacion', 'error' => $e->getMessage(),]);
                        return response()->json(['error' => 'Error creando notificacion'], 500);
                    }

                } //Fin bucle notificaciones
            }

            if (data_get($entry, 'Log')) { //Comprobamos si existen logs

                foreach ($entry->Log as $log) {
                    try {
                        try {
                            $this->currentEntry->logs()->create([
                                'package_id' => $package->id,
                                'descripcion' => $log->reg,
                                'fecha' => $log->date,
                            ]);

                            $this->currentEntry->update(['updated_at' => now()]);

                        } catch (QueryException $e) {

                            $package->update(['respuesta_http' => '400 Error creando log', 'error' => $e->getMessage(),]);
                            return response()->json(['error' => 'Error creando log'], 400);
                        }

                    } catch (\Exception $e) {

                        $package->update(['respuesta_http' => '500 Error creando log', 'error' => $e->getMessage(),]);
                        return response()->json(['error' => 'Error creando log'], 500);
                    }

                } //Fin bucle logs
            }

        } //Fin bucle entradas

        //Si va bien se marca el paquete como instalado
        $package->update([
            'implantado' => 1,
        ]);

        return response()->json(['msg' => 'Paquete instalado']);
    }
}
