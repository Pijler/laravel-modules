<?php

namespace Modules;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Modules\Support\Macros;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Macros::boot();
    }
}