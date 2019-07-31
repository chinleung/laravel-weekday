<?php

namespace ChinLeung\LaravelWeekday;

use Illuminate\Support\ServiceProvider;

class LaravelWeekdayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../vendor/chinleung/php-weekday/resources/lang', 'laravel-weekday');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../vendor/chinleung/php-weekday/resources/lang' => resource_path('lang/vendor/laravel-weekday'),
            ], 'lang');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('laravel-weekday', function () {
            return new LaravelWeekday;
        });
    }
}
