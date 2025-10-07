<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\JobMakeCommand as BaseJobMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-job')]
class JobMakeCommand extends BaseJobMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-job';
}
