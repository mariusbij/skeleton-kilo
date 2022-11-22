<?php

namespace App\Tests\Unit;

use App\Services\Validator\Exceptions\InvalidValidatorException;
use App\Services\Validator\LengthCheckValidator;
use App\Services\Validator\LowerCaseValidator;
use App\Services\Validator\SymbolValidator;
use App\Services\Validator\ValidatorService;
use Generator;
use PHPUnit\Framework\TestCase;
use stdClass;

class ValidatorServiceTest extends TestCase
{

    /** @dataProvider validatorDataProvider */
    public function testValidatorServiceReturnsError(string $class, ?string $value, bool $exception): void
    {
        if ($exception) {
            $this->expectException(InvalidValidatorException::class);
        }
        $validator = new ValidatorService([
            new $class($value)
        ]);

        $validate = $validator->validate('example Input');
        $this->assertSame($class, key($validate[0]));
    }

    public function validatorDataProvider(): generator
    {
        yield 'LengthCheckValidator' => [
            'class' => LengthCheckValidator::class,
            'value' => '20',
            'exception' => false,
        ];
        yield 'SymbolValidator' => [
            'class' => SymbolValidator::class,
            'value' => '@',
            'exception' => false,
        ];
        yield 'SymbolValidator2' => [
            'class' => SymbolValidator::class,
            'value' => '.',
            'exception' => false,
        ];
        yield 'LowerCaseValidator' => [
            'class' => LowerCaseValidator::class,
            'value' => null,
            'exception' => false,
        ];
        yield 'stdClass' => [
            'class' => stdClass::class,
            'value' => null,
            'exception' => true,
        ];
    }
}