<?php

namespace Database\Factories;

use App\Models\Literal;
use App\Models\Package;
use App\Models\Sensor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sensor>
 */
class SensorFactory extends Factory
{
    protected $model = Sensor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $packages = Package::inRandomOrder()->pluck('id');
        $literalesSensores = Literal::query()->whereBetween('codigo', [102, 105])
            ->pluck('codigo');


        return [
            'package_id' => $packages->random(),
            'tipo' => $literalesSensores->random(),
            'estado' =>  rand(0,10)?"ONLINE":"OFFLINE",
            'valor_sensor' => rand(0,1),
        ];
    }

}
