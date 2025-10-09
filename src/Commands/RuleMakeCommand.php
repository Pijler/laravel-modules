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

    /**
     * The console command description.
     */
    protected $description = 'Create a new validation rule in the specified module';
}
