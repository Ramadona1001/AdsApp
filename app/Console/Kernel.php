<?php

namespace App\Console;

use Ads\Models\Ads;
use App\Jobs\SendAdvertiserMailJob;
use App\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;

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

        $advertisers_ids = \DB::select("SELECT ads.user_id, DATE_FORMAT(ads.start_date, '%Y-%m-%d') FROM ads WHERE DATE(start_date) = CURDATE()");
        $users = [];
        if (count($advertisers_ids) > 0) {
            foreach ($advertisers_ids as $ad) {
                $users[] = $ad['user_id'];
            }
            $users = User::whereIn('id',$users)->pluck('email')->toArray();
        }
        if (count($users) > 0) {
            $schedule->job(new SendAdvertiserMailJob($users))->dailyAt('08:00');
        }
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
