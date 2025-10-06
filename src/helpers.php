<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Shared\Exceptions\Alert\ErrorException;
use Shared\Exceptions\Alert\InfoException;
use Shared\Exceptions\Alert\WarningException;

if (! function_exists('moduleHas')) {
    /**
     * Check if the module exists.
     */
    function moduleHas(string $module): bool
    {
        return File::isDirectory(modulePath($module));
    }
}

if (! function_exists('modulePath')) {
    /**
     * Get the module path.
     */
    function modulePath(string $module, string $path = ''): string
    {
        $path = Str::start($path, '/');

        return base_path(Str::trim("modules/{$module}{$path}", '/'));
    }
}

if (! function_exists('moduleComponent')) {
    /**
     * Get the vite component path.
     */
    function moduleComponent(string $component): string
    {
        if (Str::startsWith($component, 'modules/')) {
            return "{$component}.tsx";
        }

        return "resources/js/Pages/{$component}.tsx";
    }
}
