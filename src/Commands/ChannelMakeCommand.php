<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ChannelMakeCommand as BaseChannelMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-channel')]
class ChannelMakeCommand extends BaseChannelMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-channel';

    /**
     * The console command description.
     */
    protected $description = 'Create a new channel class in the specified module';
}
