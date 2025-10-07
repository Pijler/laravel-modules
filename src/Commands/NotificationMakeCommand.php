<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\NotificationMakeCommand as BaseNotificationMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-notification')]
class NotificationMakeCommand extends BaseNotificationMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-notification';
}
