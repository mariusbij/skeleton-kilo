<?php

namespace App\Services\Validator;

use App\Services\Validator\Exceptions\InvalidValidatorException;

class ValidatorService
{
    public function __construct(private array $validators)
    {
        $this->checkValidatorInstances();
    }

    public function validate(mixed $input): array
    {
        $errorsArray = [];

        foreach ($this->validators as $validator) {
            if (!$validator->validate($input)) {
                $errorsArray[] = [$validator::class => $validator->getErrorMessage()];
            }
        }
        return $errorsArray;
    }

    private function checkValidatorInstances()
    {
        foreach ($this->validators as $validator) {
            if (!($validator instanceof ValidatorInterface)) {
                throw new InvalidValidatorException($validator::class);
            }
        }
    }
}