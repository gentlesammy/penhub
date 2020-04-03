<?php

namespace App\Listeners;
use App\Notifications\NotifyAdminNewEpisodeCreatedNotification;
use App\User;
use App\Events\EpisodesCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminEpisodeCreatedListener
{
    /**
     * Handle the event.
     *
     * @param  EpisodesCreatedEvent  $event
     * @return void
     */
    public function handle(EpisodesCreatedEvent $event)
    {
        //sleep(10);
        $user = User::where('role', 5)->first();
        $user->notify(new NotifyAdminNewEpisodeCreatedNotification($event->episode));
    }
}
