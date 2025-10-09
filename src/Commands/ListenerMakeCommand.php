<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ListenerMakeCommand as BaseListenerMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-listener')]
class ListenerMakeCommand extends BaseListenerMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-listener';

    /**
     * The console command description.
     */
    protected $description = 'Create a new event listener class in the specified module';
}
