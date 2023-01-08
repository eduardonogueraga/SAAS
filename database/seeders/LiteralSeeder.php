<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiteralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('literals')->insert([
            [
                'codigo' => 102,
                'tabla' =>  'sensors',
                'literal' => 'MG',
            ],
            [
                'codigo' => 103,
                'tabla' =>  'sensors',
                'literal' => 'PIR 1',
            ],
            [
                'codigo' => 104,
                'tabla' =>  'sensors',
                'literal' => 'PIR 2',
            ],
            [
                'codigo' => 105,
                'tabla' =>  'sensors',
                'literal' => 'PIR 3',
            ],
            [
                'codigo' => 106,
                'tabla' =>  'detections',
                'literal' => 'phantom',
            ],
            [
                'codigo' => 107,
                'tabla' =>  'detections',
                'literal' => 'normal',
            ],
            [
                'codigo' => 108,
                'tabla' =>  'entries',
                'literal' => 'activacion',
            ],
            [
                'codigo' => 109,
                'tabla' =>  'entries',
                'literal' => 'desactivacion',
            ],
            [
                'codigo' => 110,
                'tabla' =>  'entries',
                'literal' => 'manual',
            ],
            [
                'codigo' => 111,
                'tabla' =>  'entries',
                'literal' => 'automatica',
            ],
            [
                'codigo' => 112,
                'tabla' =>  'entries',
                'literal' => 'VE20R2',  //Version pend cambio
            ],
            [
                'codigo' => 113,
                'tabla' =>  'notices',
                'literal' => 'AVISO ALARMA MOVIMIENTO DETECTADO EN PORCHE',
            ],
            [
                'codigo' => 114,
                'tabla' =>  'notices',
                'literal' => 'AVISO ALARMA MOVIMIENTO DETECTADO EN COCHERA',
            ],
            [
                'codigo' => 115,
                'tabla' =>  'notices',
                'literal' => 'AVISO ALARMA MOVIMIENTO DETECTADO EN ALAMCEN',
            ],
            [
                'codigo' => 116,
                'tabla' =>  'notices',
                'literal' => 'AVISO ALARMA PUERTA COCHERA ABIERTA',
            ],
            [
                'codigo' => 117,
                'tabla' =>  'notices',
                'literal' => 'ALARMA REACTIVADA CON EXITO',
            ],
            [
                'codigo' => 118,
                'tabla' =>  'notices',
                'literal' => 'MOVIMIENTO DETECTADO Y SABOTAJE EN LA ALIMENTACION',
            ],
            [
                'codigo' => 119,
                'tabla' =>  'notices',
                'literal' => 'FALLO EN LA ALIMENTACION PRINCIPAL',
            ],
            [
                'codigo' => 120,
                'tabla' =>  'notices',
                'literal' => 'Bateria de emergencia desactivada',
            ],
            [
                'codigo' => 121,
                'tabla' =>  'logs',
                'literal' => 'ALARMA INICIADA',
            ],
            [
                'codigo' => 122,
                'tabla' =>  'logs',
                'literal' => 'INTENTOS SMS DIARIOS RECUPERADOS',
            ],
            [
                'codigo' => 123,
                'tabla' =>  'logs',
                'literal' => 'SENSOR DE PUERTA DESCONECTADO',
            ],
            [
                'codigo' => 124,
                'tabla' =>  'logs',
                'literal' => 'BATERIA DE EMERGENCIA ACTIVADA',
            ],
            [
                'codigo' => 125,
                'tabla' =>  'logs',
                'literal' => 'BATERIA DE EMERGENCIA DESACTIVADA',
            ],
            [
                'codigo' => 126,
                'tabla' =>  'logs',
                'literal' => 'INTENTOS SMS REALIZADOS: ',
            ],
            [
                'codigo' => 127,
                'tabla' =>  'logs',
                'literal' => 'INTENTOS SMS DIARIOS ACABADOS',
            ],
            [
                'codigo' => 128,
                'tabla' =>  'logs',
                'literal' => 'ALARMA ESTABLECIDA EN MODO DEFAULT',
            ],
            [
                'codigo' => 129,
                'tabla' =>  'logs',
                'literal' => 'ALARMA ESTABLECIDA EN MODO PRUEBA',
            ],
            [
                'codigo' => 130,
                'tabla' =>  'logs',
                'literal' => 'LLAMANDO A MOVIL',
            ],
            [
                'codigo' => 131,
                'tabla' =>  'logs',
                'literal' => 'RESET AUTOMATICO',
            ],
            [
                'codigo' => 132,
                'tabla' =>  'logs',
                'literal' => 'RESET MANUAL',
            ],
            [
                'codigo' => 133,
                'tabla' =>  'logs',
                'literal' => 'FALLO EN ALIMENTACION',
            ],
            [
                'codigo' => 134,
                'tabla' =>  'logs',
                'literal' => 'FALLO EN SENSOR',
            ],


        ]);
    }
}
