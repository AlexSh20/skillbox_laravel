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
    protected $periodDays;
    protected $articles;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Article $article, $periodDays)
    {
        $this->articles =  Article::whereDate('created_at', '>', Carbon::now()->subDays($periodDays))->get();
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
        return $this->markdown('mail.article-created');
        /*
        return (new MailMessage)
            ->subject('Новые статьи за '.$this->periodDays.' дней')
            ->line('Здравствуйте '.$notifiable->name.', вот свежая подборка статей за '.$this->periodDays.' дней')
            foreach($articles as $article){
                ->line('Здравствуйте '.$notifiable->name.', вот свежая подборка статей за '.$this->periodDays.' дней')
            }
            ->action('Перейти на сайт', url('/'))
            ->line('Спасибо!');
          */

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
