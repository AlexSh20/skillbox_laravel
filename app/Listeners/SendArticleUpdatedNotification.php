<?php

namespace App\Listeners;

use App\Events\ArticleUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendArticleUpdatedNotification
{

    /**
     * Handle the event.
     *
     * @param  ArticleUpdated  $event
     * @return void
     */
    public function handle(ArticleUpdated $event)
    {
        \Mail::to( \Config::get('mail.to.address'))->send(
            new \App\Mail\ArticleUpdated($event->article)
        );
    }
}
