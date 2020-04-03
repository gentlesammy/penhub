<?php

namespace App\Notifications;
use App\User;
use App\Series;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSeriesNotification extends Notification
{
    use Queueable;
    public $series;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($series)
    {
        //
        $this->series = $series;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    /*
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }
    */
    public function toDatabase($notifiable)
    {

        /*
           title: **Usernamed** created New Series Created
           link:  series/{id}-{str_slug(title)}
           image: img/series/imgurl
        */
        return [
            'title'           => 'New Series created',
            'detail'           => 'A user: ' . ' ' . $this->series->user->name .' - just created a new series titled: ' . ' ' . $this->series->title,
            'link'           => '/series/'.$this->series->id.'-'.str_slug($this->series->title),
        ];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
