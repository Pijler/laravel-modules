<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\PolicyMakeCommand as BasePolicyMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-policy')]
class PolicyMakeCommand extends BasePolicyMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-policy';

    /**
     * The console command description.
     */
    protected $description = 'Create a new policy class in the specified module';
}
