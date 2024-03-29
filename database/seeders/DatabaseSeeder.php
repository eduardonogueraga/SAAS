<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables(['entries', 'sensors', 'notices', 'detections', 'logs', 'users', 'packages',  'applogs', 'systems', 'alarms', 'terminals', 'system_notices']);
        $this->call(UsersSeeder::class);
        //$this->call(PackageSeeder::class);
        $this->call(TerminalSeeder::class);
        //$this->call(EntrySeeder::class);
        //$this->call(ApplogsSeeder::class);
        $this->call(AlarmSeeder::class);
        $this->call(SystemSeeder::class);
        //$this->call(SystemNoticeSeeder::class);

    }

    public function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
