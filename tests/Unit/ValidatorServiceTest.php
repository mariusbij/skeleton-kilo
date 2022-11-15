<?php

namespace App\Tests\Unit;

use App\Services\Validator\LengthCheckValidator;
use App\Services\Validator\LowerCaseValidator;
use App\Services\Validator\SymbolValidator;
use App\Services\Validator\ValidatorService;
use PHPUnit\Framework\TestCase;

class ValidatorServiceTest extends TestCase
{
    public function testValidatorServiceReturnsError(): void
    {
        $validator = new ValidatorService([
            new LengthCheckValidator(20),
            new SymbolValidator('@'),
            new SymbolValidator('.'),
            new LowerCaseValidator(),
        ]);

        $validate = $validator->validate('example Input');

        var_dump($validate);
    }
}