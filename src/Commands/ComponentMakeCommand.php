<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ComponentMakeCommand as BaseComponentMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-component')]
class ComponentMakeCommand extends BaseComponentMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-component';
}
