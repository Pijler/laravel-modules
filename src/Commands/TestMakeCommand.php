<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\TestMakeCommand as BaseTestMakeCommand;
use Illuminate\Support\Str;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-test')]
class TestMakeCommand extends BaseTestMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-test';

    /**
     * The console command description.
     */
    protected $description = 'Create a new test class in the specified module';

    /**
     * Get the root namespace for the class.
     */
    protected function rootNamespace(): string
    {
        $module = $this->argument('module');

        return "Modules\\$module\\tests";
    }

    /**
     * Get the destination class path.
     */
    protected function getPath($name): string
    {
        $module = $this->argument('module');

        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return module_path($module, 'tests').str_replace('\\', '/', $name).'.php';
    }
}
