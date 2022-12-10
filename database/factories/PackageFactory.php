<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'contenido_peticion' => $this->faker->sentence(rand(200, 500)),
            'intentos' => rand(0,2),
            'implantado' => rand(0,10)? 0:1,
            'fecha' => now()->subDays(rand(0,60)),
        ];
    }
}
