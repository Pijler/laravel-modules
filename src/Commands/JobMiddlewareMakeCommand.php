<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\JobMiddlewareMakeCommand as BaseJobMiddlewareMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-job-middleware')]
class JobMiddlewareMakeCommand extends BaseJobMiddlewareMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-job-middleware';

    /**
     * The console command description.
     */
    protected $description = 'Create a new job middleware class in the specified module';
}
