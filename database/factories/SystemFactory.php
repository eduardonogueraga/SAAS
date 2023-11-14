<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\System>
 */
class SystemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return[

        'MODO_ALARMA' => rand(0,1),
        'MODO_SENSIBLE' => rand(0,1),
        'MODULO_SD' => rand(0,1),
        'MODULO_RTC' => rand(0,1),
        'MODULO_BLUETOOTH' => rand(0,1),
        'SENSORES_HABLITADOS' => '102;1|103;0|104;1|105;1',
        'SMS_DIARIOS' => rand(2,15),
        'NOTIFICACION_ALARMA' => rand(2,15),
        'NOTIFICACION_SISTEMA' => rand(2,15),
        'PAQUETES_ENVIADOS' => rand(2,15),
        'GSM_CSQ'=> rand(2,31),
        'GSM_VOLTAJE'=> rand(1000,4700),
        'TIEMPO_ENCENDIDO' => 87403000, //ms
        'FECHA_RESET' => now()->subHours(2)
        ];
    }
}
