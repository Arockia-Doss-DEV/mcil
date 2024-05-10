<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\AutoInvestmentClosedStatus::class,
        Commands\AutoReinvestmentClosedStatus::class,
        Commands\RedemptionSendMail::class,
        
        // Commands\DividendPayout::class,
        // Commands\AutoRenewReinvestmentStatus::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('redemption:send')->everyMinute();
        // $schedule->command('investment:close')->everyMinute();
        // $schedule->command('reinvestment:close')->everyMinute();

        // $schedule->command('redemption:send')
        //     ->timezone('Asia/Kuala_Lumpur')
        //     ->at('8:30');
        // $schedule->command('investment:close')
        //     ->timezone('Asia/Kuala_Lumpur')
        //     ->at('8:30');
        // $schedule->command('reinvestment:close')
        //     ->timezone('Asia/Kuala_Lumpur')
        //     ->at('8:30');




        $schedule->command('investment:close')->dailyAt('23:00');
        $schedule->command('redemption:send')->dailyAt('1:00');

        // $schedule->command('reinvestment:renew')->dailyAt('2:00');

        $schedule->command('reinvestment:close')->dailyAt('3:00');



        // $schedule->command('dividend:payout')->dailyAt('1:00');
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
