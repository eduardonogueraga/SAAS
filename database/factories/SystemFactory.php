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
        'SENSORES_HABLITADOS' => '102;0|103;0|104;0|105;0',
        'SMS_HISTORICO' => rand(2,15),
        'TIEMPO_ENCENDIDO' => 87403000, //ms
        'FECHA_SMS_HITORICO' => now()->subHours(2)
        ];
    }
}