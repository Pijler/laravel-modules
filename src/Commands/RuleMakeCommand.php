<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\RuleMakeCommand as BaseRuleMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-rule')]
class RuleMakeCommand extends BaseRuleMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-rule';
}
