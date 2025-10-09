<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\CastMakeCommand as BaseCastMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-cast')]
class CastMakeCommand extends BaseCastMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-cast';

    /**
     * The console command description.
     */
    protected $description = 'Create a new custom Eloquent cast class in the specified module';
}
