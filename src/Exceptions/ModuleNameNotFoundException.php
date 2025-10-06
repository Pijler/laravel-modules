<?php

namespace Modules\Exceptions;

use Exception;

class ModuleNameNotFoundException extends Exception
{
    /**
     * Create a new exception instance.
     */
    public static function make(): self
    {
        return new static('Module not determined. The path to the file must contain {Module}::{File}.');
    }
}
