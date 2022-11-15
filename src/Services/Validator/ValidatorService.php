<?php

namespace App\Services\Validator;

use App\Services\Validator\Exceptions\ValidatorInvalidInputException;

class ValidatorService
{
    public function __construct(private array $validators)
    {
    }

    public function validate(mixed $input): array
    {
        $errorsArray = [];

        foreach ($this->validators as $validator) {

            try {
                if (!$validator->validate($input)) {
                    $errorsArray[] = [$validator::class => $validator->getErrorMessage()];
                }
            } catch (ValidatorInvalidInputException $e) {

            }
        }
        return $errorsArray;
    }
}