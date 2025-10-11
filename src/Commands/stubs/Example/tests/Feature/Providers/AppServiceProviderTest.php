<?php

use Example\Providers\AppServiceProvider;
use Illuminate\Support\Facades\App;

test('it should check the variable in the service provider', function () {
    $provider = App::getProvider(AppServiceProvider::class);

    $reflection = new ReflectionClass($provider);

    expect($reflection->hasProperty('slug'))->toBeTrue();
    expect($reflection->hasProperty('module'))->toBeTrue();

    expect($reflection->getProperty('slug')->isProtected())->toBeTrue();
    expect($reflection->getProperty('module')->isProtected())->toBeTrue();

    expect($reflection->getProperty('slug')->getValue($provider))->toBe('example');
    expect($reflection->getProperty('module')->getValue($provider))->toBe('Example');
});
