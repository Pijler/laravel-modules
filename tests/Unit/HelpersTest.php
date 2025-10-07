<?php

test('it should checks if the module exists', function () {
    $exists = module_has('Admin');

    expect($exists)->toBeTrue();

    $exists = module_has('NonExistentModule');

    expect($exists)->toBeFalse();
});

test('it should gets the module path', function () {
    $path = module_path('Admin');

    expect($path)->toBe(base_path('modules/Admin'));

    $path = module_path('Admin', 'routes/web.php');

    expect($path)->toBe(base_path('modules/Admin/routes/web.php'));
});

test('it should gets the vite component path', function () {
    $path = module_component('Admin');

    expect($path)->toBe('resources/js/Pages/Admin.tsx');

    $path = module_component('modules/Admin');

    expect($path)->toBe('modules/Admin.tsx');
});
