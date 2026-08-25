<?php

namespace Pijler\LaravelModules\Commands;

use Illuminate\Foundation\Console\ScopeMakeCommand as BaseScopeMakeCommand;
use Pijler\LaravelModules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-scope')]
class ScopeMakeCommand extends BaseScopeMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-scope';

    /**
     * The console command description.
     */
    protected $description = 'Create a new scope class in the specified module';
}
