<?php

namespace Modules;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Modules\Commands\CastMakeCommand;
use Modules\Commands\ChannelMakeCommand;
use Modules\Commands\ClassMakeCommand;
use Modules\Commands\ComponentMakeCommand;
use Modules\Commands\ConfigMakeCommand;
use Modules\Commands\ConsoleMakeCommand;
use Modules\Commands\ControllerMakeCommand;
use Modules\Support\Macros;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Macros::boot();

        if ($this->app->runningInConsole()) {
            $this->commands([
                CastMakeCommand::class,
                ChannelMakeCommand::class,
                ClassMakeCommand::class,
                ComponentMakeCommand::class,
                ConfigMakeCommand::class,
                ConsoleMakeCommand::class,
                ControllerMakeCommand::class,
            ]);
        }
    }
}
