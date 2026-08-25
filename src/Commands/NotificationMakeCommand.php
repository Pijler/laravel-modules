<?php

namespace Pijler\LaravelModules\Commands;

use Illuminate\Foundation\Console\NotificationMakeCommand as BaseNotificationMakeCommand;
use Pijler\LaravelModules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-notification')]
class NotificationMakeCommand extends BaseNotificationMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-notification';

    /**
     * The console command description.
     */
    protected $description = 'Create a new notification class in the specified module';
}
