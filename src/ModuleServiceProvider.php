<?php

namespace Modules;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

/**
 * @property string $slug
 * @property string $module
 * @property Application $app
 */
class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->bootViews();

        $this->bootConfig();

        $this->bootCommands();

        $this->bootTranslations();

        $this->bootIfExists('bootGates');

        $this->bootIfExists('bootEvents');

        $this->bootIfExists('bootPolicies');

        $this->bootIfExists('bootObservers');
    }

    /**
     * Boot the views.
     */
    protected function bootViews(): void
    {
        if (File::isDirectory($views = $this->module_path('resources/views'))) {
            $this->loadViewsFrom($views, $this->slug);
        }
    }

    /**
     * Boot the translations.
     */
    protected function bootTranslations(): void
    {
        if (File::isDirectory($langs = $this->module_path('lang'))) {
            $this->loadJsonTranslationsFrom($langs);

            $this->loadTranslationsFrom($langs, $this->slug);
        }
    }

    /**
     * Boot the configuration.
     */
    protected function bootConfig(): void
    {
        if (File::isFile($config = $this->module_path('config.php'))) {
            $this->mergeConfigFrom($config, $this->slug);
        }

        if (File::isDirectory($path = $this->module_path('config'))) {
            $configs = File::files($path);

            collect($configs)->each(function ($config) {
                $pathname = $config->getPathname();
                $filename = basename($pathname, '.php');

                $this->mergeConfigFrom($pathname, "{$this->slug}.{$filename}");
            });
        }
    }

    /**
     * Boot the commands.
     */
    protected function bootCommands(): void
    {
        if (File::exists($this->module_path('app/Console/Kernel.php'))) {
            /** @var BaseKernel $kernel */
            $kernel = app("{$this->module}\\Console\\Kernel");

            $this->commands($kernel->commands());

            $this->app->booted(function () use ($kernel) {
                $schedule = $this->app->make(Schedule::class);

                $kernel->schedule($schedule);
            });
        }
    }

    /**
     * Boot the service for the module.
     */
    private function bootIfExists(string $function): void
    {
        rescue(fn () => call_user_func([$this, $function]), report: false);
    }

    /**
     * Get the module path.
     */
    private function module_path(string $path = ''): string
    {
        return module_path($this->module, $path);
    }
}
