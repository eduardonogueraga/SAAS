<?php

namespace App\Console;

use App\Jobs\PackageAlarm;
use App\Models\Alarm;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $alarmSettings = Alarm::find(1);
        $time = '*/'.$alarmSettings->periodo.' * * * *';

        $schedule->job(new PackageAlarm($alarmSettings))
            ->cron($time)
            ->name('packageAlarm')
            ->withoutOverlapping();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
