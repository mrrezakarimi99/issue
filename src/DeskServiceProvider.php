<?php


namespace RezaKarimi\ServiceDesk;


use Illuminate\Support\ServiceProvider;

class DeskServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {

            $this->mergeConfigFrom(
                __DIR__.'/config.php','desk'
            );

//            $this->publishes([
//                __DIR__.'/config-service-desk.php' => app()->basePath() . '/config/config-service-desk.php',
//            ], 'desk');

        }
    }

    public function register()
    {

    }
}
