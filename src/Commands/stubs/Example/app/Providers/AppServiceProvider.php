<?php

namespace Example\Providers;

use Modules\ModuleServiceProvider;

class AppServiceProvider extends ModuleServiceProvider
{
    /**
     * The module slug.
     */
    protected string $slug = 'example';

    /**
     * The module name.
     */
    protected string $module = 'Example';

    /**
     * Register any module services.
     */
    public function register(): void
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
