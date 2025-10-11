<?php

namespace Example\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Define the routes for the application.
     */
    public function map(): void
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapChannelRoutes();
    }

    /**
     * Define the "api" routes for the application.
     */
    protected function mapApiRoutes(): void
    {
        Route::prefix('api')
            ->middleware('api')
            ->group(module_path('Example', '/routes/api.php'));
    }

    /**
     * Define the "web" routes for the application.
     */
    protected function mapWebRoutes(): void
    {
        Route::middleware('web')
            ->group(module_path('Example', '/routes/web.php'));
    }

    /**
     * Define the "channel" routes for the application.
     */
    protected function mapChannelRoutes(): void
    {
        if (File::exists(module_path('Example', '/routes/channel.php'))) {
            require module_path('Example', '/routes/channel.php');
        }
    }
}
