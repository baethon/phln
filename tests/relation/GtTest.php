<?php

use function phln\relation\gt;

class GtTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_value_is_greater()
    {
        $this->assertTrue(gt(2, 1));
        $this->assertFalse(gt(2, 2));
        $this->assertFalse(gt(2, 3));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = gt(2);
        $this->assertTrue($f(1));
    }
}
