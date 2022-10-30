<?php

namespace Database\Factories;

use App\Models\Deteccion;
use App\Models\Entradas;
use App\Models\Log;
use App\Models\Sensor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entradas>
 */
class EntradasFactory extends Factory
{
    protected $model = Entradas::class;

    public function configure()
    {
        return $this->afterCreating(function ($entrada) {

            $entrada->detecciones()->saveMany(Deteccion::factory(rand(1,5))->make());

            foreach ($entrada->detecciones as $deteccion){
                $deteccion->sensor()->save(Sensor::factory()->make());
            }

            foreach (range(0,rand(1,3)) as $i){
                $entrada->logs()->save(Log::factory()->make());
            }

        });
    }


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition()
    {
        return [
            'tipo' => rand(0,1) ? "activacion":"desactivacion",
            'modo' => rand(0,3) ? "manual":"automatica",
            'restaurada' => rand(0,10)? 0:1,
            'intentos_reactivacion' => rand(0,3),
            'fecha' => now()->subDays(rand(0,60)),
        ];
    }



}
