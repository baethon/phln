<?php

use Baethon\Phln\Phln as P;

class SubtractTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_subtracts_number()
    {
        $this->assertEquals(4, P::subtract(7, 3));
    }

    public function test_it_is_curried()
    {
        $complementaryAngle = P::subtract(90);
        $this->assertEquals(30, $complementaryAngle(60));
    }
}
