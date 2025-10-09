<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\RequestMakeCommand as BaseRequestMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-request')]
class RequestMakeCommand extends BaseRequestMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-request';

    /**
     * The console command description.
     */
    protected $description = 'Create a new form request class in the specified module';
}
