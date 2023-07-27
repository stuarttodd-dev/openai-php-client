<?php

namespace Stuarttodd\OpenAiPhpClient\Exceptions;

use Exception;

class LibraryNotSetException extends Exception
{
    public function __construct($message = 'Library not set. You must define a library to continue.', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}