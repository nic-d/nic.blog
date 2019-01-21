<?php

namespace App\Providers;

use App\Topic;
use Illuminate\Support\ServiceProvider;

/**
 * Class TopicServiceProvider
 * @package App\Providers
 */
class TopicServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with('topics', Topic::all());
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}