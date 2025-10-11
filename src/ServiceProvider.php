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
use Modules\Commands\EnumMakeCommand;
use Modules\Commands\EventMakeCommand;
use Modules\Commands\ExceptionMakeCommand;
use Modules\Commands\InterfaceMakeCommand;
use Modules\Commands\JobMakeCommand;
use Modules\Commands\JobMiddlewareMakeCommand;
use Modules\Commands\ListenerMakeCommand;
use Modules\Commands\MailMakeCommand;
use Modules\Commands\MiddlewareMakeCommand;
use Modules\Commands\ModuleMakeCommand;
use Modules\Commands\NotificationMakeCommand;
use Modules\Commands\ObserverMakeCommand;
use Modules\Commands\PolicyMakeCommand;
use Modules\Commands\ProviderMakeCommand;
use Modules\Commands\RequestMakeCommand;
use Modules\Commands\ResourceMakeCommand;
use Modules\Commands\RuleMakeCommand;
use Modules\Commands\ScopeMakeCommand;
use Modules\Commands\TestMakeCommand;
use Modules\Commands\TraitMakeCommand;
use Modules\Commands\ViewMakeCommand;
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
