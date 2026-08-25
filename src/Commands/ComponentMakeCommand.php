<?php

namespace Pijler\LaravelModules\Commands;

use Illuminate\Foundation\Console\ComponentMakeCommand as BaseComponentMakeCommand;
use Pijler\LaravelModules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-component')]
class ComponentMakeCommand extends BaseComponentMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-component';

    /**
     * The console command description.
     */
    protected $description = 'Create a new view component class in the specified module';
}
