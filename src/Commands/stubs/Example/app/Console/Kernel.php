<?php

namespace Example\Console;

use Illuminate\Console\Scheduling\Schedule;
use Modules\BaseKernel;

class Kernel extends BaseKernel
{
    /**
     * Define the application's command schedule.
     */
    public function schedule(Schedule $schedule): void
    {
        // 
    }

    /**
     * Register the commands for the application.
     */
    public function commands(): array
    {
        return $this->load(__DIR__.'/Commands');
    }
}
