<?php

namespace Marius\Kilo\Tests\Unit;

use Marius\Kilo\Cars\Jeep;
use PHPUnit\Framework\TestCase;

class JeepTest extends TestCase
{
    public function test_jeep_horn(): void
    {
        $jeep = new Jeep();
        $this->assertTrue($jeep->horn());
    }
}