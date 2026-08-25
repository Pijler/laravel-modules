<?php

namespace Pijler\LaravelModules\Commands;

use Illuminate\Foundation\Console\ClassMakeCommand as BaseClassMakeCommand;
use Pijler\LaravelModules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-class')]
class ClassMakeCommand extends BaseClassMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-class';

    /**
     * The console command description.
     */
    protected $description = 'Create a new class in the specified module';
}
