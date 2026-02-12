<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

if (! function_exists('module_has')) {
    /**
     * Check if the module exists.
     */
    function module_has(string $module): bool
    {
        return File::isDirectory(module_path($module));
    }
}

if (! function_exists('module_path')) {
    /**
     * Get the module path.
     */
    function module_path(string $module, string $path = ''): string
    {
        $path = Str::start($path, '/');

        return base_path(Str::trim("modules/{$module}{$path}", '/'));
    }
}

if (! function_exists('module_component')) {
    /**
     * Get the vite component path.
     *
     * Extension from config('inertia.page_extension') ?? 'tsx'.
     */
    function module_component(string $component): string
    {
        $extension = config('inertia.page_extension') ?? 'tsx';

        if (Str::startsWith($component, 'modules/')) {
            return "{$component}.{$extension}";
        }

        return "resources/js/Pages/{$component}.{$extension}";
    }
}
