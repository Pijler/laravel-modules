<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\MailMakeCommand as BaseMailMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-mail')]
class MailMakeCommand extends BaseMailMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-mail';

    /**
     * The console command description.
     */
    protected $description = 'Create a new email class in the specified module';
}
