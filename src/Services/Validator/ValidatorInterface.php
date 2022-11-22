<?php

namespace App\Services\Validator;

interface ValidatorInterface
{
    public function validate(mixed $input): bool;

    public function getErrorMessage(): string;
}