<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\EnumMakeCommand as BaseEnumMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-enum')]
class EnumMakeCommand extends BaseEnumMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-enum';

    /**
     * Get the default namespace for the class.
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $module = $this->argument('module');

        return match (true) {
            is_dir(module_path($module, 'app/Enums')) => $rootNamespace.'\\Enums',
            is_dir(module_path($module, 'app/Enumerations')) => $rootNamespace.'\\Enumerations',
            default => $rootNamespace,
        };
    }
}
