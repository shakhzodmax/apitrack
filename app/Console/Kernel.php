<?php

namespace App\Console;

use App\Console\Commands\ApiCheckEveryDay;
use App\Console\Commands\ApiCheckEveryMonth;
use App\Console\Commands\ApiCheckEveryQuarter;
use App\Console\Commands\ApiCheckEveryYear;
use App\Console\Commands\ApiCheckForce;
use App\Console\Commands\ApiCheckRealTime;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(ApiCheckEveryDay::class)->cron('0 12 * * *');
        $schedule->command(ApiCheckEveryMonth::class)->cron('0 0 1 * *');
        $schedule->command(ApiCheckEveryQuarter::class)->cron('0 0 1 3,6,9,12 *');
        $schedule->command(ApiCheckEveryYear::class)->cron('0 0 31 12 *');
        $schedule->command(ApiCheckRealTime::class)->cron('* * * * * *');
        $schedule->command(ApiCheckForce::class);

    }

    protected $commands = [
        Commands\ApiCheckEveryDay::class,
        Commands\ApiCheckEveryMonth::class,
        Commands\ApiCheckEveryQuarter::class,
        Commands\ApiCheckEveryYear::class,
        Commands\ApiCheckRealTime::class,
        Commands\ApiCheckForce::class,
    ];

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
