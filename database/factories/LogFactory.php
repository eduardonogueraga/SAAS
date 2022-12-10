<?php

namespace Database\Factories;

use App\Models\Log;
use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        return [
            'package_id' => $packages->random(),
            'descripcion' =>  $this->faker->sentence(rand(0,30)),
            'fecha' => now()->subDays(rand(0,60)),
        ];
    }
}
