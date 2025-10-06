<?php

namespace Modules\Exceptions;

use Exception;

class FilePathIsIncorrectException extends Exception
{
    /**
     * Create a new exception instance.
     */
    public static function make(string $path): self
    {
        return new static("React file from path {$path} does not exist.");
    }
}
