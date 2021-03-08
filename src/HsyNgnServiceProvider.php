<?php


namespace Hsy\Ngn;


use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class HsyNgnServiceProvider extends ServiceProvider
{
    public function boot()
    {


        $this->publishes([
            __DIR__ . '/../config/ngn.php' => config_path('ngn.php'),
        ], 'config');
    }

    public function register()
    {
        $this->registerResources();
    }

    /**
     * Register the package resources such as routes, templates, etc.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->registerConfigs();
        $this->registerRoutes();
    }


    /**
     * Register the package routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }

    /**
     * Get the Press route group configuration array.
     *
     * @return array
     */
    protected function routeConfiguration()
    {

        $middlewares = ["web"];

        return [
            'namespace' => 'Hsy\Permissions\Http\Controllers',
            'prefix' => "ngn",
            'middleware' => $middlewares,
            "as" => "ngn.",
        ];
    }

    private function registerConfigs()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/ngn.php', 'ngn');
    }

}
