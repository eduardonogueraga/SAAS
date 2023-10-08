<?php

namespace App\Http\Requests;

use App\Models\Applogs;
use App\Models\Package;
use App\Models\SystemNotice;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CreateSystemNoticeRequest extends FormRequest
{
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
    public function createNewSystemNotification(){
        try {

            $respuestaErrorHttp = '400 Formato erroneo';
            $errorPaquete = 'Formato erroneo';

            //Comprobamos que el descifrado de la notificacion se este OK
            $notificacionDescifrada = openssl_decrypt($this->getContent(), env('CIPHER'), env('AES_KEY'), 0, hex2bin(env('IV_HEX')));

            //Deserializamos el paquete
            if (($peticionJSON = json_decode($notificacionDescifrada)) === null) {
                $respuestaErrorHttp = '400 Error cifrado';
                $errorPaquete = 'Notifcacion cifrada, no se puede instalar la notificacion';
            }
            //Guardamos en contenido en el log de la aplicacion
            $contenidoRecibido = ($peticionJSON)? json_encode($peticionJSON) :  $this->getContent();

            $this->appLog = Applogs::create([
                'tipo' => 'api',
                'contenido_peticion' => Str::limit($contenidoRecibido,1000),
                'respuesta_http' => '',
            ]);

            //Comprobar que el JSON no viene vacio
            if($peticionJSON === null){
                //En el caso de problemas con el formato unicamente actualizamos el log
                $this->appLog->update(['respuesta_http' => $respuestaErrorHttp, 'error' => $errorPaquete]);
                return response()->json(['error' => 'Formato de erroneo'], 400);
            }

            //Compruebo que el tipo sea valido TODO usar validadores JSON
            if (!in_array($peticionJSON->type, [0, 1])) {
                $this->appLog->update(['respuesta_http' => '400 Formato de erroneo', 'error' => 'Formato de erroneo',]);
                return response()->json(['error' => 'Formato de erroneo'], 400);
            }
            //Compruebo si la fecha esta en condiciones en caso contrario creo una falsa
            try {
                Carbon::parse($peticionJSON->date);
            } catch (\Exception $e) {
                $peticionJSON->date = "2099-01-01T00:00:00";
            }

            //Si tiene formato JSON procedemos con la creacion de la notificacion
            try {
                //Si el formato es el adecuado creamos la notificacion
                     SystemNotice::create([
                    'tipo' => ($peticionJSON->type==0)? 'sys' : 'alarm',
                    'desc' => $peticionJSON->reg,
                    'fecha' => $peticionJSON->date,
                ]);

                $this->appLog->update(['respuesta_http' => '200 Notificacion ok',]);
                return response()->json(['msg' => 'Notificacion ok']);

            } catch (QueryException $e) {
                $this->appLog->update(['respuesta_http' => '400 Error al crear la notificación SAA', 'error' => $e->getMessage(),]);
                return response()->json(['error' => 'Error al crear la notificacion SAA'], 400);
            }

        } catch (\Exception $e) {
            $this->appLog->update(['respuesta_http' => '500 Error al crear la notificación SAA', 'error' => $e->getMessage(),]);
            return response()->json(['error' => 'Error creando la notificacion SAA'], 500);
        }

    }
}
