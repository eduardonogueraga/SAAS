<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applogs>
 */
class ApplogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tipo = rand(0,3) ? 'api': 'alarm';

        return [
            'tipo' => $tipo,
            'desc' => $tipo === 'alarm'? 'Estado alarma OK' : 'Entrada de datos',
            'contenido_peticion' => $tipo === 'api'? ($this->faker->sentence(rand(10,20))) : null,
            'respuesta_http' => $tipo === 'api'? $this->faker->sentence(3) : null,
            'error' => $tipo === 'api'? (rand(0,10)? null:"400 Formato de erroneo") : null,
        ];
    }
}
