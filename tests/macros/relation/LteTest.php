<?php

use Baethon\Phln\Phln as P;

class LteTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_value_is_less_or_equal()
    {
        $this->assertTrue(P::lte(1, 1));
        $this->assertTrue(P::lte(1, 2));
        $this->assertFalse(P::lte(3, 2));
    }

    public function test_it_is_curried()
    {
        $f = P::lte(1);

        $this->assertTrue($f(2));
        $this->assertTrue($f(1));
        $this->assertFalse($f(-1));
    }
}
