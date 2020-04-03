<?php

namespace App\Listeners;
use App\Notifications\NewProfileSetUpNotification;
use App\User;
use App\Events\NewProfileCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminAboutProfileListener
{
    /**
     * Handle the event.
     *
     * @param  NewProfileCreatedEvent  $event
     * @return void
     */
    public function handle(NewProfileCreatedEvent $event)
    {
        $user = User::where('role', 5)->first();
        $user->notify(new NewProfileSetUpNotification($event->pro));
    }
}
