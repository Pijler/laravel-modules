<?php

namespace Pijler\LaravelModules\Commands;

use Illuminate\Routing\Console\MiddlewareMakeCommand as BaseMiddlewareMakeCommand;
use Pijler\LaravelModules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-middleware')]
class MiddlewareMakeCommand extends BaseMiddlewareMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-middleware';

    /**
     * The console command description.
     */
    protected $description = 'Create a new HTTP middleware class in the specified module';
}
