<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        dd(Tag::tagsCloud());
        /*
        view()->composer('layout.sidebar', function($view){
            $view->with('tagsCloud', Tag::tagsCloud());
        });*/
    }
}
