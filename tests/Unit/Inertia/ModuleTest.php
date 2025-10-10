<?php

use Modules\Exceptions\FilePathIsIncorrectException;
use Modules\Exceptions\FilePathNotSpecifiedException;
use Modules\Exceptions\ModuleNameNotFoundException;
use Modules\Exceptions\ModuleNotExistException;
use Modules\Inertia\Module;

beforeEach(function () {
    $this->module = new Module;
});

test('it should module path', function () {
    $path = $this->module->build('Index');
    expect($path)->toBe('Index');

    $path = $this->module->build('Index.tsx');
    expect($path)->toBe('Index.tsx');

    $path = $this->module->build('Auth::Index');
    expect($path)->toBe('modules/Auth/resources/js/Pages/Index');

    $path = $this->module->build('Auth::Index.tsx');
    expect($path)->toBe('modules/Auth/resources/js/Pages/Index');
});

test('it should get full path - exception', function () {
    $this->module->build('Auth::NotExist');
})->throws(FilePathIsIncorrectException::class);

test('it should get path - exception', function () {
    $this->module->build('Auth::');
})->throws(FilePathNotSpecifiedException::class);

test('it should get module name - exception', function () {
    $this->module->build('NotExist::Index');
})->throws(ModuleNotExistException::class);

test('it should explode source - exception', function () {
    $this->module->build('::Index');
})->throws(ModuleNameNotFoundException::class);
