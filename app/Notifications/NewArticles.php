<?php

namespace App\Notifications;

<<<<<<< HEAD
=======
use App\Models\Article;
use Carbon\Carbon;
>>>>>>> command
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewArticles extends Notification
{
    use Queueable;
<<<<<<< HEAD
    protected $periodDays;
=======

    protected $period;
    protected $articles;

>>>>>>> command
    /**
     * Create a new notification instance.
     *
     * @return void
     */
<<<<<<< HEAD
    public function __construct($periodDays)
    {
        $this->periodDays = $periodDays;
=======
    public function __construct($period)
    {
        $this->articles = Article::whereDate('created_at', '>', Carbon::now()->subDays($period))->get();
        $this->period = $period;
>>>>>>> command
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
<<<<<<< HEAD
            ->subject('Новые статьи за ')
            ->line('Здравствуйте '.$notifiable->name.', вот свежая подборка статей за неделю.')
            ->action('Перейти на сайт', url('/'))
            ->line('Спасибо!');
=======
            ->subject('Новые статьи за ' . $this->period . ' дней')
            ->markdown('mail.mailing', ['period' => $this->period, 'articles' => $this->articles]);
>>>>>>> command
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
