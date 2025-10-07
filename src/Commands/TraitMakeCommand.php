<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\TraitMakeCommand as BaseTraitMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-trait')]
class TraitMakeCommand extends BaseTraitMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-trait';

    /**
     * Get the default namespace for the class.
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        $module = $this->argument('module');

        return match (true) {
            is_dir(module_path($module, 'app/Concerns')) => $rootNamespace.'\\Concerns',
            is_dir(module_path($module, 'app/Traits')) => $rootNamespace.'\\Traits',
            default => $rootNamespace,
        };
    }
}
