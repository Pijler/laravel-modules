<?php

namespace Modules\Support;

use Inertia\Inertia;
use Inertia\Testing\AssertableInertia;
use Modules\Inertia\Module;

class Macros
{
    /**
     * Boot the custom macros.
     */
    public static function boot(): void
    {
        if (class_exists(Inertia::class)) {
            Inertia::macro('module', function (string $view, array $props = []) {
                return Inertia::render((new Module)->build($view), $props);
            });
        }

        if (class_exists(AssertableInertia::class)) {
            AssertableInertia::macro('module', function (string $view) {
                /** @var AssertableInertia $this */
                return $this->component((new Module)->build($view));
            });
        }
    }
}
