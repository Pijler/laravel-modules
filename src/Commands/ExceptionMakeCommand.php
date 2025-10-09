<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ExceptionMakeCommand as BaseExceptionMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-exception')]
class ExceptionMakeCommand extends BaseExceptionMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-exception';

    /**
     * The console command description.
     */
    protected $description = 'Create a new custom exception class in the specified module';
}
