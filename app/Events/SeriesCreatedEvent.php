<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SeriesCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $series;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($series)
    {
        $this->series = $series;
    }

}//end of class seriescreatedevent
