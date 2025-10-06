<?php

namespace Modules\Inertia;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;
use Modules\Exceptions\FilePathIsIncorrectException;
use Modules\Exceptions\FilePathNotSpecifiedException;
use Modules\Exceptions\ModuleNameNotFoundException;
use Modules\Exceptions\ModuleNotExistException;

/**
 * @see https://github.com/toanld/modules-inertia/blob/master/src/ModulesInertiaSource.php
 */
class Module
{
    /**
     * Build the full path for an Inertia module given the source string.
     */
    public function build(string $source): string
    {
        return Str::of($source)->whenContains('::', function ($string) {
            $sourceData = $this->explodeSource($string);

            $moduleName = $this->getModuleName($sourceData[0]);

            $path = $this->getPath($sourceData[1]);

            return $this->getFullPath($moduleName, $path);
        })->toString();
    }

    /**
     * Get the full path for an Inertia module.
     */
    private function getFullPath(string $moduleName, string $path): Stringable
    {
        $path = "resources/js/Pages/{$path}";

        $fullPath = module_path($moduleName, "{$path}.tsx");

        if (! File::exists($fullPath)) {
            throw FilePathIsIncorrectException::make($fullPath);
        }

        return Str::of("modules/{$moduleName}/{$path}");
    }

    /**
     * Get the path for an Inertia module.
     */
    private function getPath(string $string): string
    {
        if (blank($string)) {
            throw FilePathNotSpecifiedException::make();
        }

        if (Str::contains($string, '.tsx')) {
            $string = Str::before($string, '.tsx');
        }

        return Str::of($string)->rtrim('/');
    }

    /**
     * Get the module name from the source string.
     */
    private function getModuleName(string $moduleName): string
    {
        if (! module_has($moduleName)) {
            throw ModuleNotExistException::make($moduleName);
        }

        return $moduleName;
    }

    /**
     * Explode the source string to get the module name and path.
     */
    private function explodeSource(string $source): array
    {
        if (blank(Str::before($source, '::'))) {
            throw ModuleNameNotFoundException::make();
        }

        return Str::of($source)->explode('::')->toArray();
    }
}
