<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ProviderMakeCommand as BaseProviderMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-provider')]
class ProviderMakeCommand extends BaseProviderMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-provider';

    /**
     * The console command description.
     */
    protected $description = 'Create a new service provider class in the specified module';
}
