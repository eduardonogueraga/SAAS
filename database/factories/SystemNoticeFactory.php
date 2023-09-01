<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SystemNotice>
 */
class SystemNoticeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $tipo = rand(0,3) ? 'alarm': 'sys';

        return [
            'tipo' => $tipo,
            'desc' => $tipo === 'sys'? 'Error en el sistema ' : 'Salto en alarma sensores: N-N-N-N',
            'procesado' => 1,
            'fecha' => now()->subDays(rand(0,60)),
        ];
    }
}
