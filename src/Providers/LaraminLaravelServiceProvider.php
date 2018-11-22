<?php


namespace Laramin\Providers;

use App\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use Laramin\Controllers\DashboardController;
use Laramin\Console\Commands\CrudCommand;
use Laramin\Middleware\ModelCrudEntryPoint;

class LaraminLaravelServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                CrudCommand::class,
            ]);
        }

        // migrations
        $this->loadMigrationsFrom(__DIR__ . '../database/migrations');

        // views
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laramin');

        $kernel = $this->app[Kernel::class];
        $kernel->pushMiddleware(ModelCrudEntryPoint::class);

        $this->publishes([
            __DIR__ . '/../config/laramin.php' => config_path('laramin.php'),
            __DIR__ . '/../resources/views' => resource_path('views/vendor/laramin'),
        ]);

        $attributes = ['middleware' => ['web', ModelCrudEntryPoint::class]];

        $this->app['router']->group($attributes, function ($router) {
            $router->match(
                ['get', 'post'], config('laramin.entrypoint'),
                '\\' . DashboardController::class
            );
        });
    }
}