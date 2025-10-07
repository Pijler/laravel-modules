<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ViewMakeCommand as BaseViewMakeCommand;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-view')]
class ViewMakeCommand extends BaseViewMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-view';
}
