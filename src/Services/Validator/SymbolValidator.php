<?php

namespace App\Services\Validator;

class SymbolValidator implements ValidatorInterface
{
    private string $errorMessage;

    public function __construct(private string $symbol)
    {
    }

    public function validate(mixed $input): bool
    {
        if (!str_contains($input, $this->symbol)) {
            $this->errorMessage = sprintf('The input must be at least 1 %s symbol', $this->symbol);
            return false;
        }
        return true;
    }

    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}