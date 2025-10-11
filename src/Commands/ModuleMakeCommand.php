<?php

namespace Modules\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Modules\Traits\BaseCommands;
use Symfony\Component\Console\Attribute\AsCommand;

use function Laravel\Prompts\text;

#[AsCommand(name: 'module:make')]
class ModuleMakeCommand extends Command
{
    use BaseCommands;

    /**
     * The console command name.
     */
    protected $signature = 'module:make {module?}';

    /**
     * The console command description.
     */
    protected $description = 'Create a new module';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $module = $this->argument('module') ?? text(
            required: true,
            label: 'Module Name',
            placeholder: 'Enter the module name',
        );

        $module = Str::studly($module);

        if ($this->moduleExists($module)) {
            $this->error("Module [{$module}] already exists!");

            return self::FAILURE;
        }

        $this->createModuleStructure($module);

        $this->replaceNamespaceInFiles($module);

        $this->info("Module [{$module}] created successfully.");

        return self::SUCCESS;
    }

    /**
     * Check if the module already exists.
     */
    private function moduleExists(string $module): bool
    {
        return File::exists(module_path($module));
    }

    /**
     * Create the directory structure for the new module.
     */
    private function createModuleStructure(string $module): void
    {
        File::ensureDirectoryExists(module_path($module));

        File::copyDirectory(__DIR__.'/stubs/Example', module_path($module));
    }

    /**
     * Replace the namespace placeholders in the module files.
     */
    private function replaceNamespaceInFiles(string $module): void
    {
        $files = File::allFiles(module_path($module));

        collect($files)->each(function ($file) use ($module) {
            $content = File::get($file->getRealPath());

            $content = Str::replace('Example', $module, $content);

            $content = Str::replace('example', Str::kebab($module), $content);

            File::put($file->getRealPath(), $content);
        });
    }
}
