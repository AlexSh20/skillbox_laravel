<?php

namespace App\Listeners;

use App\Events\ArticleCreated;
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
    public function handle(ArticleCreated $event)
    {
        \Mail::to(\Config::get('mail.to.address'))->send(
            new \App\Mail\ArticleCreated($event->article)
        );
    }
}
