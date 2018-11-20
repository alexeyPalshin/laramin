<?php


namespace Laramin\Providers;

use Illuminate\Support\ServiceProvider;
use Laramin\Controllers\HomeController;

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
        $attributes =  ['middleware' => ['web']];

        $this->app['router']->group($attributes, function ($router) {
            $router->match(
                ['get', 'post'], config('laramin.admin_endpoint'),
                '\\'.HomeController::class
            );
        });
    }
}