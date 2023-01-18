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

        return [
            'contenido_peticion' => $this->faker->sentence(rand(10,20)),
            'respuesta_http' => $this->faker->sentence(3),
            'error' => rand(0,10)? null:"400 Formato de erroneo",
        ];
    }
}
