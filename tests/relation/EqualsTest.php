<?php

use function phln\relation\equals;
use const phln\relation\equals;

class EqualsTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_values_are_equal()
    {
        $this->assertTrue(equals(1, 1));
        $this->assertFalse(equals(1, '1'));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = equals(1);
        $this->assertTrue($f(1));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertTrue(call_user_func(equals, 1, 1));
    }
}
