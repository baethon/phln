<?php

use function phln\relation\lte;

class LteTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_value_is_less_or_equal()
    {
        $this->assertTrue(lte(1, 1));
        $this->assertTrue(lte(1, 2));
        $this->assertFalse(lte(3, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = lte(1);

        $this->assertTrue($f(2));
        $this->assertTrue($f(1));
        $this->assertFalse($f(-1));
    }
}
