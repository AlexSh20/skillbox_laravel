<?php

namespace App\Providers;

use App\Models\Tag;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
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
        view()->composer('layout.sidebar', function($view){
            $view->with('tagsCloud', Tag::tagsCloud());
        });

        Blade::if('admin', function (){
            return auth()->check() && auth()->user()->isAdmin();
        });

        Paginator::defaultSimpleView('pagination::simple-default');

    }
}
