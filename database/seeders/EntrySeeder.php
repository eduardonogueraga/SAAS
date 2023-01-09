<?php

namespace Database\Seeders;

use App\Models\Entry;
use App\Models\Notice;
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
        $entrada =  Entry::create([
            'id' => 1,
            'package_id' => '1',
            'tipo' => "activacion",
            'modo' =>  "manual",
            'restaurada' => 1,
            'intentos_reactivacion' => 0,
            'saa_version' => 'VE20R2',
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

        $entrada =  Entry::factory()->create([
            'created_at' => $date
        ]);

        if(rand(0,7)){
            $entrada->notices()->save(Notice::factory()->make());
            $entrada->save();

        }

    }

}


