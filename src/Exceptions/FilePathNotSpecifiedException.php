<?php

namespace Modules\Exceptions;

use Exception;

class FilePathNotSpecifiedException extends Exception
{
    /**
     * Create a new exception instance.
     */
    public static function make(): self
    {
        return new static('Display file path not specified.');
    }
}
