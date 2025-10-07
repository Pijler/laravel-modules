<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\TestMakeCommand as BaseTestMakeCommand;
use Illuminate\Support\Str;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'module:make-test')]
class TestMakeCommand extends BaseTestMakeCommand
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $name = 'module:make-test';

    /**
     * Get the root namespace for the class.
     */
    protected function rootNamespace(): string
    {
        return 'Tests';
    }

    /**
     * Get the destination class path.
     */
    protected function getPath($name): string
    {
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return base_path('tests').str_replace('\\', '/', $name).'.php';
    }
}
