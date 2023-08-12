<?php

namespace Database\Seeders;

use App\Models\SystemNotice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemNoticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,30) as $i){
            SystemNotice::factory()->create();
        }
    }
}
