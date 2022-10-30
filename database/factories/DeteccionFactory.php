<?php

namespace Database\Factories;

use App\Models\Deteccion;
use App\Models\Sensor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Deteccion>
 */

class DeteccionFactory extends Factory
{
    protected $model = Deteccion::class;

    public function configure()
    {
        return $this->afterCreating(function ($deteccion) {
            $deteccion->sensor()->save(Sensor::factory()->make());
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $umbral = rand(0,3);

        return [
        'intrusismo' => $umbral==3? 1:0,
        'umbral' => $umbral,
        'restaurado' => rand(0,10)? 0:1,
        'modo_deteccion' => rand(0,1) ? "normal":"phantom",
        'fecha' => now()->subDays(rand(0,60)),

        ];
    }
}
