<?php

namespace App\Console;

use App\Helpers\MessageBuilderHelper;
use App\Helpers\WAHelper;
use App\Jobs\SendWA;
use App\Models\Service;
use App\Models\Tax;
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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
         $schedule->call( function (){
             $services = Service::upcomingServices(3)->get();
             foreach ($services as $service) {
                 $reminderMsg = MessageBuilderHelper::nextServiceReminderMsg($service);
                 dispatch(new SendWA($reminderMsg->to,$reminderMsg->message. ' send by schedule at '.date('H:i:s')));
             }
         })->timezone('Asia/Jakarta')->dailyAt('17:50');

        $schedule->call( function (){
            $taxes = Tax::upcomingTaxes(3)->get();
            foreach ($taxes as $tax) {
                $reminderMsg = MessageBuilderHelper::nextTaxReminderMsg($tax);
                dispatch(new SendWA($reminderMsg->to,$reminderMsg->message. ' send by schedule at '.date('H:i:s')));
            }
        })->timezone('Asia/Jakarta')->dailyAt('10:05');
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
