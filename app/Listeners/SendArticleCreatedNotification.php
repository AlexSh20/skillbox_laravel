<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
use App\Providers\PushAllServiceProvider;
use App\Services\Pushall;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleCreatedNotification
{
    /**
     * Handle the event.
     *
     * @param ArticleCreated $event
     * @return void
     */

    public function __construct(Pushall $pushall)
    {
        $this->pushall = $pushall;
    }

    public function handle(ArticleCreated $event)
    {
        \Mail::to(\Config::get('mail.to.address'))->send(
            new \App\Mail\ArticleCreated($event->article)
        );

        $this->pushall->send('Новая статья на сайте', 'Здравствуйте! На сайте появилась новая статья: ' . $event->article->name);
    }
}
