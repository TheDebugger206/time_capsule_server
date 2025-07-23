<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\RevealCapsules;
use App\Console\Commands\AutoCapsuleNotification;

class Kernel extends ConsoleKernel
{

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command(RevealCapsules::class)->everyMinute();


        $schedule->command('app:auto-capsule-notification')->everyMinute();


        // testing
        $schedule->command('app:test-schedule')->everyMinute();

    }

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

}
