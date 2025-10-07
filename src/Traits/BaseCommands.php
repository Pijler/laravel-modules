<?php

namespace Modules\Traits;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

trait BaseCommands
{
    /**
     * Get the console command arguments.
     */
    protected function getArguments(): array
    {
        return array_merge([
            ['module', InputArgument::REQUIRED, 'The name of the module to create the '.strtolower($this->type).' in', null, $this->possibleModules()],
        ], parent::getArguments());
    }

    /**
     * Prompt for missing input arguments using the returned questions.
     */
    protected function promptForMissingArgumentsUsing(): array
    {
        return array_merge([
            'module' => 'Which module would you like to use?',
        ], parent::promptForMissingArgumentsUsing());
    }

    /**
     * Get a list of possible modules names.
     */
    protected function possibleModules(): array
    {
        return collect(File::directories(base_path('modules')))
            ->map(fn ($dir) => basename($dir))
            ->sort()
            ->values()
            ->all();
    }

    /**
     * Get a list of possible event names.
     *
     * @return array<int, string>
     */
    protected function possibleEvents()
    {
        $module = $this->argument('module');

        $eventPath = module_path($module, 'app/Events');

        if (! File::isDirectory($eventPath)) {
            return [];
        }

        return collect(File::files($eventPath))
            ->map(fn ($file) => $file->getBasename('.php'))
            ->sort()
            ->values()
            ->all();
    }

    /**
     * Get the root namespace for the class.
     */
    protected function rootNamespace(): string
    {
        $module = $this->argument('module');

        return "{$module}\\";
    }

    /**
     * Get the destination class path.
     */
    protected function getPath($name)
    {
        $module = $this->argument('module');

        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return module_path($module, 'app').'/'.str_replace('\\', '/', $name).'.php';
    }

    /**
     * Get the first view directory path from the application configuration.
     */
    protected function viewPath($path = '')
    {
        $module = $this->argument('module');

        $views = module_path($module, 'resources/views');

        return $views.($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}
