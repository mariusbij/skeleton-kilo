<?php

namespace App\Services\Validator;

use App\Services\Validator\Exceptions\ValidatorInvalidInputException;

class LowerCaseValidator implements ValidatorInterface
{
    private string $errorMessage;

    public function validate(mixed $input): bool
    {
        if (!ctype_lower($input)) {
            $this->errorMessage = 'The input must contain only lowercase characters';
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}