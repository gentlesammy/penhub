<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        'App\Events\SeriesCreatedEvent' => [
            'App\Listeners\NotifyAdminSeriesCreatedListener',
        ],

        'App\Events\EpisodesCreatedEvent' => [
            'App\Listeners\NotifyAdminEpisodeCreatedListener',
        ],

        'App\Events\NewProfileCreatedEvent' => [
            'App\Listeners\NotifyAdminAboutProfileListener',
        ],




    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
