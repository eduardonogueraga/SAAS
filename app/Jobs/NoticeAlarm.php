<?php

namespace App\Jobs;

use App\Models\Alarm;
use App\Models\Applogs;
use App\Models\Notice;
use App\Models\SystemNotice;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Telegram\Bot\Api;

class NoticeAlarm implements ShouldQueue
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
        //Comprobamos si estan habilitadas las notificaciones en caso contrario no se hara nada
        if(!$this->alarmSettings->notificaciones){
            echo "Notificaciones desactivadas |Job NoticeAlarm\n";
            return;
        }

        $ultimaNotificacionEnviada= Notice::max('id');

        //Se comprueba si existen nuevos en cuyo caso se actualizara el id
        if($this->alarmSettings->last_notice_id != $ultimaNotificacionEnviada){

            $notificacionesNuevas = Notice::whereBetween('id', [$this->alarmSettings->last_notice_id, $ultimaNotificacionEnviada])->get();

            foreach ($notificacionesNuevas as $notificacion) {

                //Guardamos en contenido en el log de la aplicacion
                $appLog = Applogs::create([
                    'tipo' => 'alarm',
                ]);

                if($notificacion->tipo == 'sms'){
                    $msg = "Notificación SMS | " . trans('data.notices.literales.'.$notificacion->asunto);
                }else {
                    $msg = "Llamada saliente | " . trans('data.notices.tlf.'.$notificacion->telefono);
                }

                //Notificacion
                $msg = $this->enviarMensajeTelegram($msg);

                $appLog->update(['desc' => $msg]);

                sleep(2);
            }

            $this->alarmSettings->update(['last_notice_id' => $ultimaNotificacionEnviada]);
        }else {
            echo "Sin novedad en los mensajes de la alarma |Job NoticeAlarm\n";
        }

        //Se comprueba si existen nuevos en cuyo caso se actualizara el id
        $notificacionesSistemaNuevas = SystemNotice::where('procesado', 0)->get();
            if (!$notificacionesSistemaNuevas->isEmpty()){
                echo "Notificaciones detectadas, procesando...\n";
                foreach ($notificacionesSistemaNuevas as $notificacion) {
                    //Guardamos en contenido en el log de la aplicacion
                    $appLog = Applogs::create([
                        'tipo' => 'alarm',
                    ]);

                    $msg = "Notificación " . (($notificacion->tipo == "alarm")? "de alarma: \"": "del sistema SAA: \"")
                        . $notificacion->desc . "\" \nHora de la Alberquilla: "
                        . $notificacion->fecha;

                    //Notificacion
                    $msg = $this->enviarMensajeTelegram($msg);
                    $appLog->update(['desc' => $msg]);
                    //Marco la notificacion como procesada
                    $notificacion->update(['procesado' => 1]);
                    //echo $msg;
                    sleep(2);
                }
            $ultimaNotifacionSistemaProcesada = SystemNotice::max('id');
            $this->alarmSettings->update(['last_sys_notice_id' => $ultimaNotifacionSistemaProcesada]);

        }else {
            echo "Sin novedad en las notificaciones de la alarma |Job NoticeAlarm\n";
        }

    }

    /**
     * @param string $msg
     * @return string
     * @throws \Telegram\Bot\Exceptions\TelegramSDKException
     */
    public function enviarMensajeTelegram(string $msg): string
    {
        $telegram = new Api();
        $msg = $msg . " | Hora del servidor " . Carbon::now()
            . "\nConsulta la infomación en ".
            env('APP_URL')
            ." \n"
        ;

        $telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => $msg,
            'disable_notification' => false,
        ]);

        return $msg;
    }
}
