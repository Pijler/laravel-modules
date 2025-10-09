<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\EventMakeCommand as BaseEventMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-event')]
class EventMakeCommand extends BaseEventMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-event';

    /**
     * The console command description.
     */
    protected $description = 'Create a new event class in the specified module';
}
