<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Entry::create([
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

     Entry::factory()->create([
            'created_at' => $date
        ]);

    }

}


