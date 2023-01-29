<?php

namespace Database\Factories;

use App\Models\Literal;
use App\Models\Log;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    protected $model = Log::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $packages = Package::inRandomOrder()->pluck('id');
        $literalesLogs = array_keys(trans('data.logs.literales'));

        return [
            'package_id' => $packages->random(),
            'descripcion' =>  Arr::random($literalesLogs),
            'fecha' => now()->subDays(rand(0,60)),
        ];
    }
}
