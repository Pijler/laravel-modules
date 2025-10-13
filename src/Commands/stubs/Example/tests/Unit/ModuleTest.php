<?php

use Illuminate\Support\Facades\File;

test('it should check the directories in module', function () {
    $path = module_path('Example');

    $directories = File::directories($path);

    expect($directories)->toContain(
        module_path('Example', 'app'),
        module_path('Example', 'lang'),
        module_path('Example', 'resources'),
        module_path('Example', 'routes'),
        module_path('Example', 'tests'),
    );
});
