<?php

namespace Database\Seeders;

use App\Models\Alarm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Alarm::create(['ultima_ejecucion' => now()]);
    }
}
