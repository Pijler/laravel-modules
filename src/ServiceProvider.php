<?php

namespace Pijler\LaravelModules;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Pijler\LaravelModules\Commands\CastMakeCommand;
use Pijler\LaravelModules\Commands\ChannelMakeCommand;
use Pijler\LaravelModules\Commands\ClassMakeCommand;
use Pijler\LaravelModules\Commands\ComponentMakeCommand;
use Pijler\LaravelModules\Commands\ConfigMakeCommand;
use Pijler\LaravelModules\Commands\ConsoleMakeCommand;
use Pijler\LaravelModules\Commands\ControllerMakeCommand;
use Pijler\LaravelModules\Commands\EnumMakeCommand;
use Pijler\LaravelModules\Commands\EventMakeCommand;
use Pijler\LaravelModules\Commands\ExceptionMakeCommand;
use Pijler\LaravelModules\Commands\InterfaceMakeCommand;
use Pijler\LaravelModules\Commands\JobMakeCommand;
use Pijler\LaravelModules\Commands\JobMiddlewareMakeCommand;
use Pijler\LaravelModules\Commands\ListenerMakeCommand;
use Pijler\LaravelModules\Commands\MailMakeCommand;
use Pijler\LaravelModules\Commands\MiddlewareMakeCommand;
use Pijler\LaravelModules\Commands\ModuleMakeCommand;
use Pijler\LaravelModules\Commands\NotificationMakeCommand;
use Pijler\LaravelModules\Commands\ObserverMakeCommand;
use Pijler\LaravelModules\Commands\PolicyMakeCommand;
use Pijler\LaravelModules\Commands\ProviderMakeCommand;
use Pijler\LaravelModules\Commands\RequestMakeCommand;
use Pijler\LaravelModules\Commands\ResourceMakeCommand;
use Pijler\LaravelModules\Commands\RuleMakeCommand;
use Pijler\LaravelModules\Commands\ScopeMakeCommand;
use Pijler\LaravelModules\Commands\TestMakeCommand;
use Pijler\LaravelModules\Commands\TraitMakeCommand;
use Pijler\LaravelModules\Commands\ViewMakeCommand;
use Pijler\LaravelModules\Support\Macros;

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
                EnumMakeCommand::class,
                EventMakeCommand::class,
                ExceptionMakeCommand::class,
                InterfaceMakeCommand::class,
                JobMakeCommand::class,
                JobMiddlewareMakeCommand::class,
                ListenerMakeCommand::class,
                MailMakeCommand::class,
                MiddlewareMakeCommand::class,
                ModuleMakeCommand::class,
                NotificationMakeCommand::class,
                ObserverMakeCommand::class,
                PolicyMakeCommand::class,
                ProviderMakeCommand::class,
                RequestMakeCommand::class,
                ResourceMakeCommand::class,
                RuleMakeCommand::class,
                ScopeMakeCommand::class,
                TestMakeCommand::class,
                TraitMakeCommand::class,
                ViewMakeCommand::class,
            ]);
        }
    }
}
