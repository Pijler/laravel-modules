<?php

namespace Modules\Commands;

use Illuminate\Foundation\Console\ViewMakeCommand as BaseViewMakeCommand;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
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

    /**
     * Get the destination view path.
     */
    protected function getPath($name): string
    {
        return $this->viewPath(
            $this->getNameInput().'.'.$this->option('extension'),
        );
    }

    /**
     * Get the destination test case path.
     */
    protected function getTestPath(): string
    {
        $module = $this->argument('module');

        return module_path($module, Str::of($this->testClassFullyQualifiedName())
            ->replaceFirst("Modules\\{$module}\\", '')
            ->replace('\\', '/')
            ->append('Test.php')
            ->value());
    }

    /**
     * Get the class fully qualified name for the test.
     */
    protected function testClassFullyQualifiedName(): string
    {
        $module = $this->argument('module');

        $name = Str::of(Str::lower($this->getNameInput()))->replace('.'.$this->option('extension'), '');

        $namespacedName = Str::of(
            (new Stringable($name))
                ->replace('/', ' ')
                ->explode(' ')
                ->map(fn ($part) => (new Stringable($part))->ucfirst())
                ->implode('\\')
        )
            ->replace(['-', '_'], ' ')
            ->explode(' ')
            ->map(fn ($part) => (new Stringable($part))->ucfirst())
            ->implode('');

        return "Modules\\{$module}\\tests\\Feature\\View\\{$namespacedName}";
    }

    /**
     * Create the matching test case if requested.
     */
    protected function handleTestCreation($path): bool
    {
        if (! $this->option('test') && ! $this->option('pest') && ! $this->option('phpunit')) {
            return false;
        }

        $contents = preg_replace(
            ['/\{{ namespace \}}/', '/\{{ class \}}/', '/\{{ name \}}/'],
            [$this->testNamespace(), $this->testClassName(), $this->testViewName()],
            File::get($this->getTestStub()),
        );

        File::ensureDirectoryExists(dirname($this->getTestPath()), 0755, true);

        $result = File::put($path = $this->getTestPath(), $contents);

        $this->components->info(sprintf('%s [%s] created successfully.', 'Test', $path));

        return $result !== false;
    }
}
