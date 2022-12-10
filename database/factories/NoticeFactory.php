<?php

namespace Database\Factories;

use App\Models\Notice;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notice>
 */
class NoticeFactory extends Factory
{

    protected $model = Notice::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tipo  = rand(0,1)? "sms":"llamada";
        $packages = Package::inRandomOrder()->pluck('id');

        return [
        'package_id' => $packages->random(),
        'tipo' => $tipo,
        'asunto' => $tipo == "sms" ? Arr::random($this->getRandomAsunto()) : null,
        'cuerpo' =>  $tipo == "sms" ? $this->faker->sentence(rand(10,20))  : null,
        'telefono' => $this->faker->numerify('##########'),
        'fecha' => now()->subHours(2)
        ];
    }

    public function getRandomAsunto()
    {
        return ['AVISO ALARMA MOVIMIENTO DETECTADO EN PORCHE',
                'AVISO ALARMA MOVIMIENTO DETECTADO EN COCHERA',
                'AVISO ALARMA MOVIMIENTO DETECTADO EN ALAMCEN',
                'AVISO ALARMA PUERTA COCHERA ABIERTA',
                'ALARMA REACTIVDA CON EXITO'];
    }
}
