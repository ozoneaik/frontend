<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\ResetData;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // เรียกใช้ Command ที่เราสร้าง
        $schedule->command('reset:data')
            ->dailyAt('00:00')
            ->when(function () {
                return now()->day === 1 && now()->month === 1; // 1 มกราคม (วันแรกของปี)
            });
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
