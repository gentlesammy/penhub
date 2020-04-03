<?php

namespace App\Listeners;
use App\Notifications\NewSeriesNotification;
use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminSeriesCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        //sleep(5);
        $user = User::where('role', 5)->first();
        $user->notify(new NewSeriesNotification($event->series));
    }
}
