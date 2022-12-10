<?php

namespace Database\Factories;

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

        return [
            'package_id' => $packages->random(),
            'tipo' => Arr::random($this->getRandomSensorType()),
            'estado' =>  rand(0,10)?"ONLINE":"OFFLINE",
            'valor_sensor' => rand(0,1),
        ];
    }

    public function getRandomSensorType()
    {
        return ['MG', 'PIR1','PIR2', 'PIR3'];
    }
}
