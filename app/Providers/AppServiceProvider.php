<?php

namespace App\Providers;

use App\Services\ParserService;
use App\Services\SocialiteService;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use UniSharp\LaravelFilemanager\LaravelFilemanagerServiceProvider;

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
        Paginator::useBootstrap();

        $this->app->bind(ParserService::class, function () {
            return new ParserService();
        });

        $this->app->bind(SocialiteService::class, function () {
            return new SocialiteService();
        });

        URL::forceScheme('https');
    }
}
