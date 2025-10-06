<?php

namespace Modules\Exceptions;

use Exception;

class ModuleNotExistException extends Exception
{
    /**
     * Create a new exception instance.
     */
    public static function make(string $name): self
    {
        return new static("Module {$name} does not exist.");
    }
}
