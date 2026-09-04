<?php

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\Kernel;
use Pijler\LaravelModules\Traits\BaseCommands;

test('it lists artisan commands without make command name conflicts', function () {
    $this->artisan('list')->assertSuccessful();
});

test('it registers module make commands with the module argument', function (string $command) {
    $commands = $this->app->make(Kernel::class)->all();

    expect($commands)->toHaveKey($command)
        ->and(data_get($commands, $command)->getName())->toBe($command)
        ->and(data_get($commands, $command)->getDefinition()->hasArgument('module'))->toBeTrue();
})->with([
    'module:make',
    'module:make-job',
    'module:make-cast',
    'module:make-enum',
    'module:make-mail',
    'module:make-rule',
    'module:make-test',
    'module:make-view',
    'module:make-class',
    'module:make-event',
    'module:make-scope',
    'module:make-trait',
    'module:make-config',
    'module:make-policy',
    'module:make-channel',
    'module:make-command',
    'module:make-request',
    'module:make-listener',
    'module:make-observer',
    'module:make-provider',
    'module:make-resource',
    'module:make-component',
    'module:make-exception',
    'module:make-interface',
    'module:make-controller',
    'module:make-middleware',
    'module:make-notification',
    'module:make-job-middleware',
]);

test('it keeps the original laravel generator options on module make commands', function (string $command, string $option) {
    $this->artisan("{$command} --help")
        ->expectsOutputToContain('<module>')
        ->expectsOutputToContain($option)
        ->assertSuccessful();
})->with([
    ['module:make-job', '--sync'],
    ['module:make-test', '--pest'],
    ['module:make-cast', '--inbound'],
]);

test('it remaps inherited laravel generator signatures to module make commands', function () {
    $command = new class extends Command
    {
        use BaseCommands;

        protected $signature = 'make:cast {name : The name of the cast} {--f|force : Create the class even if the cast already exists} {--inbound : Generate an inbound cast class}';
    };

    expect($command->getName())->toBe('module:make-cast')
        ->and($command->getDefinition()->hasOption('force'))->toBeTrue()
        ->and($command->getDefinition()->hasArgument('name'))->toBeTrue()
        ->and($command->getDefinition()->hasOption('inbound'))->toBeTrue()
        ->and($command->getDefinition()->hasArgument('module'))->toBeTrue();
});
