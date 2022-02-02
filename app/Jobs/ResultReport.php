<?php

namespace App\Jobs;

use App\Mail\ReportCreated;
use App\Models\Article;
use App\Models\Comment;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use App\Notifications\ReportSended;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResultReport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $request;

    public $deleteWhenMissingModels = true;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request->all();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $report = "";

        isset($this->request['articles_checkbox']) == 'on' ? $report .= "<p>Статей: " . Article::all()->count() . "</p>" : '';
        isset($this->request['news_checkbox']) == 'on' ? $report .= "<p>Новостей: " . News::all()->count() . "</p>" : '';
        isset($this->request['comments_checkbox']) == 'on' ? $report .= "<p>Комментариев: " . Comment::all()->count() . "</p>" : '';
        isset($this->request['tags_checkbox']) == 'on' ? $report .= "<p>Тэгов: " . Tag::all()->count() . "</p>" : '';
        isset($this->request['users_checkbox']) == 'on' ? $report .= "<p>Пользователей: " . User::all()->count() . "</p>" : '';

        auth()->user()->notify(new ReportSended($report));

        /*
        \Mail::to(User::where('id', Auth()->id())->first())->send(
            new \App\Mail\ReportCreated($report)
        );*/

    }
}
