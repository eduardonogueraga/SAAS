<?php

namespace Database\Factories;

use App\Models\Notice;
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
        return [
        'tipo' => rand(0,1)? "aviso":"salto",
        'asunto' => Arr::random($this->getRandomAsunto()),
        'cuerpo' => $this->faker->sentence(rand(10,20)),
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
