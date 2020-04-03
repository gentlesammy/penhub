<?php

namespace App\Notifications;
use App\User;
use App\Series;
use App\Episode;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyAdminNewEpisodeCreatedNotification extends Notification
{
    use Queueable;
    public $episode;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($episode)
    {
        $this->episode = $episode;
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
        return [
            'title'         =>'New Episode Created',
            'detail'        =>$this->episode->series->user->name . 'created a new Episode titled'. $this->episode->title,
            'link'          => '/episodes/'.$this->episode->slug,
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
