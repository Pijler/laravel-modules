<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ObserverMakeCommand as BaseObserverMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-observer')]
class ObserverMakeCommand extends BaseObserverMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-observer';

    /**
     * The console command description.
     */
    protected $description = 'Create a new observer class in the specified module';
}
