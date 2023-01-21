<?php

namespace Database\Seeders;

use App\Models\Applogs;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,100) as $i){
            $this->createRandomLogs();
        }

    }

    public function createRandomLogs()
    {
        $date = now()->subDays(rand(0,60));

        Applogs::factory()->create([
            'created_at' => $date
        ]);

    }
}
