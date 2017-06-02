<?php

use function phln\logic\ƛor;

class OrTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_at_least_one_value_is_true()
    {
        $this->assertTrue(ƛor(false, true));
        $this->assertTrue(ƛor(true, false));
        $this->assertTrue(ƛor(true, true));
        $this->assertFalse(ƛor(false, false));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = ƛor(true);
        $this->assertTrue($f(false));
    }
}
