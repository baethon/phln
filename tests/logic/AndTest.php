<?php

use function phln\logic\ƛand;

class AndTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_both_values_are_true()
    {
        $this->assertTrue(ƛand(true, true));
        $this->assertFalse(ƛand(true, false));
        $this->assertTrue(ƛand(true, 1));
        $this->assertFalse(ƛand(false, false));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = ƛand(true);
        $this->assertTrue($f(true));
        $this->assertFalse($f(false));
    }
}
