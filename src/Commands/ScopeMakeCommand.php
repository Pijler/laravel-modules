<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ScopeMakeCommand as BaseScopeMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-scope')]
class ScopeMakeCommand extends BaseScopeMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-scope';
}
