<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\InterfaceMakeCommand as BaseInterfaceMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-interface')]
class InterfaceMakeCommand extends BaseInterfaceMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-interface';

    /**
     * The console command description.
     */
    protected $description = 'Create a new interface in the specified module';

    /**
     * Get the default namespace for the class.
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $module = $this->argument('module');

        return match (true) {
            is_dir(module_path($module, 'app/Contracts')) => "{$rootNamespace}\\Contracts",
            is_dir(module_path($module, 'app/Interfaces')) => "{$rootNamespace}\\Interfaces",
            default => $rootNamespace,
        };
    }
}
