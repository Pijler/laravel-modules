<?php

test('it should checks if the module exists', function () {
    $exists = module_has('Auth');
    expect($exists)->toBeTrue();

    $exists = module_has('NonExistentModule');
    expect($exists)->toBeFalse();
});

test('it should gets the module path', function () {
    $path = module_path('Auth');
    expect($path)->toBe(base_path('modules/Auth'));

    $path = module_path('Auth', 'routes/web.php');
    expect($path)->toBe(base_path('modules/Auth/routes/web.php'));
});

test('it should gets the vite component path', function () {
    $path = module_component('Index');
    expect($path)->toBe('resources/js/Pages/Index.tsx');

    $path = module_component('modules/Auth/resources/js/Pages/Index');
    expect($path)->toBe('modules/Auth/resources/js/Pages/Index.tsx');
});

test('it should use configurable extension via inertia config', function () {
    config(['inertia.page_extension' => 'vue']);

    $path = module_component('Index');
    expect($path)->toBe('resources/js/Pages/Index.vue');

    $path = module_component('modules/Auth/resources/js/Pages/Index');
    expect($path)->toBe('modules/Auth/resources/js/Pages/Index.vue');

    config(['inertia.page_extension' => null]);
});

test('it should default to tsx when no config is set', function () {
    config(['inertia.page_extension' => null]);

    $path = module_component('Index');
    expect($path)->toBe('resources/js/Pages/Index.tsx');

    $path = module_component('modules/Auth/resources/js/Pages/Index');
    expect($path)->toBe('modules/Auth/resources/js/Pages/Index.tsx');
});
