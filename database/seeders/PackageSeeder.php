<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,50) as $i){
            $this->createRandomPackages();
        }
    }

    public function createRandomPackages()
    {
        $date = now()->subDays(rand(0,60));

        Package::factory()->create([
            'created_at' => $date
        ]);

    }
}
