<?php

namespace Database\Seeders;

use App\Models\Entradas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada =  Entradas::create([
            'id' => 1,
            'tipo' => "activacion",
            'modo' =>  "manual",
            'restaurada' => 1,
            'intentos_reactivacion' => 0,
            'fecha' => now()->subHours(2),
            'created_at' => now()
        ]);

        foreach (range(0,30) as $i){
            $this->createRandomEntries();
        }

    }

    public function createRandomEntries()
    {
        $date = now()->subDays(rand(0,60));

        $entrada = Entradas::factory()->create([
            'created_at' => $date
        ]);

    }

}


