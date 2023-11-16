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
//        $schedule->command(ApiCheckEveryDay::class);        // Har kunlik
//        $schedule->command(ApiCheckEveryMonth::class);      // Har oylik
//        $schedule->command(ApiCheckEveryQuarter::class);    // Har choraklik
//        $schedule->command(ApiCheckEveryYear::class);       // Har yillik
//        $schedule->command(ApiCheckRealTime::class);        // Get so'rov asosida
        $schedule->command(ApiCheckForce::class);           // Muddatidan oldin
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
