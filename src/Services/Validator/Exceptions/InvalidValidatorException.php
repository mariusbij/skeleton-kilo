<?php

namespace App\Services\Validator\Exceptions;

use App\Services\Validator\ValidatorInterface;
use InvalidArgumentException;
use Throwable;

class InvalidValidatorException extends InvalidArgumentException
{
    public const ERROR_MESSAGE = 'Class: %s is not instance of '. ValidatorInterface::class;

    public function __construct(string $class, $code = 0, Throwable $previous = null)
    {
        parent::__construct(sprintf(self::ERROR_MESSAGE, $class), $code, $previous);
    }
}