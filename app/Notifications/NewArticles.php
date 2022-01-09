<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewArticles extends Notification
{
    use Queueable;
    protected $periodDays;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($periodDays)
    {
        $this->periodDays = $periodDays;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Новые статьи за ')
            ->line('Здравствуйте '.$notifiable->name.', вот свежая подборка статей за неделю.')
            ->action('Перейти на сайт', url('/'))
            ->line('Спасибо!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
