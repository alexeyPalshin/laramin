<?php


namespace Laramin\Providers;

use Illuminate\Support\ServiceProvider;

class LaraminLaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/laramin.php' => config_path('laramin.php'),
        ]);
    }
}