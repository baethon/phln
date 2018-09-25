<?php

use Baethon\Phln\Phln as P;

class EqualsTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_values_are_equal()
    {
        $this->assertTrue(P::equals(1, 1));
        $this->assertFalse(P::equals(1, '1'));
    }

    public function test_it_is_curried()
    {
        $f = P::equals(1);
        $this->assertTrue($f(1));
    }
}
