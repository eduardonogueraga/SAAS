<?php

namespace Database\Factories;

use App\Models\Literal;
use App\Models\Package;
use App\Models\Sensor;
use App\Models\Terminal;
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
        $terminals = Terminal::inRandomOrder()->pluck('id');

        $literalesSensores = array_keys(trans('data.sensor.literales'));

        $terminal = null;
        if(!rand(0,5)){
            $terminal = $terminals->random();
        }

        return [
            'package_id' => $packages->random(),
            'terminal_id' => $terminal,
            'tipo' =>  !($terminal) ? Arr::random($literalesSensores) : rand(0,8),
            'estado' =>  rand(0,10)?"ONLINE":"OFFLINE",
            'valor_sensor' => rand(0,1),
        ];
    }

}
