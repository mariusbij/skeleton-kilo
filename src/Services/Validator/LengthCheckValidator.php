<?php

namespace App\Services\Validator;

class LengthCheckValidator implements ValidatorInterface
{
    private string $errorMessage;

    public function __construct(private readonly int $length)
    {
    }

    public function validate(mixed $input): bool
    {
        if (strlen($input) < $this->length) {
            $this->errorMessage = sprintf('The input must be at least %d characters', $this->length);
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}