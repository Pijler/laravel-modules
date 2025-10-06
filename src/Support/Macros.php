<?php

namespace Modules\Support;

use Modules\Inertia\Module;

class Macros
{
    /**
     * Boot the custom macros.
     */
    public static function boot(): void
    {
        if (class_exists(\Inertia\Inertia::class)) {
            \Inertia\Inertia::macro('module', function (string $view, array $props = []) {
                return \Inertia\Inertia::render((new Module)->build($view), $props);
            });
        }

        if (class_exists(\Inertia\Testing\AssertableInertia::class)) {
            \Inertia\Testing\AssertableInertia::macro('module', function (string $view) {
                /** @var \Inertia\Testing\AssertableInertia $this */
                return $this->component((new Module)->build($view));
            });
        }
    }
}
