<?php

namespace App\Services\Validator\Exceptions;

class ValidatorInvalidInputException extends \Exception
{
    public const ERROR_MESSAGE = '';

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}