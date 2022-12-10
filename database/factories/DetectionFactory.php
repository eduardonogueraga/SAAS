<?php

namespace Database\Factories;

use App\Models\Detection;
use App\Models\Package;
use App\Models\Sensor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Detection>
 */

class DetectionFactory extends Factory
{
    protected $model = Detection::class;

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
        $packages = Package::inRandomOrder()->pluck('id');

        return [
        'package_id' => $packages->random(),
        'intrusismo' => $umbral==3? 1:0,
        'umbral' => $umbral,
        'restaurado' => rand(0,10)? 0:1,
        'modo_deteccion' => rand(0,1) ? "normal":"phantom",
        'fecha' => now()->subDays(rand(0,60)),

        ];
    }
}
