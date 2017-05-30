<?php

use function phln\relation\gte;

class GteTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_value_is_greater_or_equal()
    {
        $this->assertTrue(gte(2, 2));
        $this->assertTrue(gte(2, 1));
        $this->assertFalse(gte(2, 3));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = gte(2);
        $this->assertTrue($f(2));
        $this->assertTrue($f(1));
        $this->assertFalse($f(3));
    }
}
