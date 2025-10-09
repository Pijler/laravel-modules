<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ViewMakeCommand as BaseViewMakeCommand;
use Illuminate\Support\Facades\File;
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

    /**
     * The console command description.
     */
    protected $description = 'Create a new view in the specified module';

    // /**
    //  * Get the destination view path.
    //  *
    //  * @param  string  $name
    //  * @return string
    //  */
    // protected function getPath($name)
    // {
    //     return $this->viewPath(
    //         $this->getNameInput().'.'.$this->option('extension'),
    //     );
    // }

    // /**
    //  * Create the matching test case if requested.
    //  *
    //  * @param  string  $path
    //  */
    // protected function handleTestCreation($path): bool
    // {
    //     if (! $this->option('test') && ! $this->option('pest') && ! $this->option('phpunit')) {
    //         return false;
    //     }

    //     $contents = preg_replace(
    //         ['/\{{ namespace \}}/', '/\{{ class \}}/', '/\{{ name \}}/'],
    //         [$this->testNamespace(), $this->testClassName(), $this->testViewName()],
    //         File::get($this->getTestStub()),
    //     );

    //     File::ensureDirectoryExists(dirname($this->getTestPath()), 0755, true);

    //     $result = File::put($path = $this->getTestPath(), $contents);

    //     $this->components->info(sprintf('%s [%s] created successfully.', 'Test', $path));

    //     return $result !== false;
    // }
}
