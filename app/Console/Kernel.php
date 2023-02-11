<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\FillFeed;
use App\Model\Feed\Feed;
use App\Utility\Status;

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
        // $schedule->command('inspire')->hourly();
        
        
        $schedule->call(function () {
            
           $feeds = Feed::latest()->where('status', Status::CONFIRMED)->get();

        if (isset($feeds) && !empty($feeds) && count($feeds) > 0) {
            foreach ($feeds as $feed) {
                FillFeed::dispatch($feed);
            }
            toast(__('site.done'), 'success');
            return back();
        }
        
        
        })->cron('* * * * *');
        
        
        
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
