<?php


namespace RezaKarimi\ServiceDesk;


use Illuminate\Support\ServiceProvider;

class DeskServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config.php', 'desk'
        );
    }

    public function register()
    {

    }
}
