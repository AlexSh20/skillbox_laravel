<?php

namespace App\Notifications;

use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewArticles extends Notification
{
    use Queueable;

    protected $period;
    protected $articles;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($period)
    {
        $this->articles = Article::whereDate('created_at', '>', Carbon::now()->subDays($period))->get();
        $this->period = $period;
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
            ->subject('Новые статьи за ' . $this->period . ' дней')
            ->markdown('mail.mailing', ['period' => $this->period, 'articles' => $this->articles]);
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
