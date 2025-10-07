<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ConfigMakeCommand as BaseConfigMakeCommand;
use Illuminate\Support\Str;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-config', aliases: ['config:make-module'])]
class ConfigMakeCommand extends BaseConfigMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-config';

    /**
     * The console command name aliases.
     */
    protected $aliases = ['config:make-module'];

    /**
     * Get the destination file path.
     */
    protected function getPath($name): string
    {
        $module = $this->argument('module');

        $file = Str::finish($this->argument('name'), '.php');

        return module_path($module, "config/{$file}");
    }
}
