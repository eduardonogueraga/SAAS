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


        $json = json_encode([
            'name' => $this->faker->name,
            'address' => [
                'street' => $this->faker->streetName,
                'city' => $this->faker->city,
                'zipcode' => $this->faker->postcode,
                'country' => $this->faker->country,
            ],
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'company' => [
                'name' => $this->faker->company,
                'catchPhrase' => $this->faker->catchPhrase,
            ],
            'date' => $this->faker->dateTime->format('Y-m-d H:i:s')
        ]);

        return [
            'contenido_peticion' => $json,//$this->faker->sentence(rand(200, 500)),
            'intentos' => rand(0,2),
            'implantado' => rand(0,10)? 0:1,
            'saa_version' => 'VE20R2',
            'fecha' => now()->subDays(rand(0,60)),
        ];
    }
}
