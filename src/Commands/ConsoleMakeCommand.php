<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ConsoleMakeCommand as BaseConsoleMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-command')]
class ConsoleMakeCommand extends BaseConsoleMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-command';

    /**
     * The console command description.
     */
    protected $description = 'Create a new Artisan command in the specified module';
}
