<?php

namespace Modules\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as BaseControllerMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-controller')]
class ControllerMakeCommand extends BaseControllerMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-controller';

    /**
     * The console command description.
     */
    protected $description = 'Create a new controller class in the specified module';
}
