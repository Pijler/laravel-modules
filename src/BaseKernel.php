<?php

namespace Modules;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

abstract class BaseKernel
{
    /**
     * Register the scheduled commands.
     */
    abstract public function schedule(Schedule $schedule): void;

    /**
     * Register the commands for the application.
     */
    abstract public function commands(): array;

    /**
     * Load the commands within the given directory.
     */
    protected function load(string $path): array
    {
        if (! File::isDirectory($path)) {
            return [];
        }

        $files = File::allFiles($path);

        return collect($files)->map(fn (SplFileInfo $file) => $this->commandClassFromFile($file))->toArray();
    }

    /**
     * Extract the command class name from the given file path.
     */
    private function commandClassFromFile(SplFileInfo $file): string
    {
        $realPath = $file->getRealPath();

        $modulesPath = realpath(base_path('modules'));

        $commandPath = Str::remove('app/', Str::after($realPath, "{$modulesPath}/"));

        return Str::replace(['/', '.php'], ['\\', ''], $commandPath);
    }
}
