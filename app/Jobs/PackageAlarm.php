<?php

namespace App\Jobs;

use App\Models\Alarm;
use App\Models\Applogs;
use App\Models\Package;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class PackageAlarm implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected Alarm $alarmSettings;

    public function __construct(Alarm $alarm)
    {
        $this->alarmSettings = $alarm;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Comprobamos que la alarma este activada en caso contrario no se hara nada
        if(!$this->alarmSettings->activa){
            echo "Alarma desactivada";
            return;
        }

        //Guardamos en contenido en el log de la aplicacion
        $appLog = Applogs::create([
            'tipo' => 'alarm',
        ]);

        $ultimoPaqueteIntalado = Package::max('id');

        if($this->alarmSettings->last_package_id !== $ultimoPaqueteIntalado){
            //Existe un nuevo paquete, la comprobacion resulta OK
            $appLog->update(['desc' => 'Alarma OK Existe nuevo paquete']);
            echo "Existe el nuevo paquete OK";


            //Se actualizan los intentos y paquete
            $this->alarmSettings->update(['last_package_id' => $ultimoPaqueteIntalado,
                                         'intentos_realizados' => 0]);


        }else{

            //No ha llegado el paquete, se comprueban los intentos restantes
            if($this->alarmSettings->intentos_realizados < $this->alarmSettings->max_intentos){

                //Se suma un intento y la alarma prosigue
                $log =  'Alarma KO No se ha recibido el paquete | Intento numero:' . ($this->alarmSettings->intentos_realizados +1) . ' de ' . $this->alarmSettings->max_intentos;
                $appLog->update(['desc' => $log]);
                echo "Se suma un intento y la alarma prosigue";

                $intentosActualizados = $this->alarmSettings->intentos_realizados +1;
                $this->alarmSettings->update(['intentos_realizados' => $intentosActualizados]);


            }else {

                //Supera los intentos
                $log = ('Alarma KO Intentos superados ' .(($this->alarmSettings->notificaciones)? 'Aviso enviado': ' Aviso no enviado'));
                $appLog->update(['desc' => $log]);
                echo "Supera los intentos";

                $this->alarmSettings->update(['intentos_realizados' => 0]);  //Se actualizan los intentos

                if($this->alarmSettings->notificaciones){
                    //Notificacion
                    echo "Notificacion";
                }

            }


        }

    }
}
