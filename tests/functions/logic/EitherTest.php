<?php

use Baethon\Phln as p;

class EitherTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_one_of_predicates_returns_true()
    {
        $p = function ($i) {
            return $i > 10;
        };
        $p2 = function ($i) {
            return 0 === $i % 2;
        };

        $f = p\either($p, $p2);

        $this->assertTrue($f(11));
        $this->assertTrue($f(2));
        $this->assertFalse($f(3));
        $this->assertFalse($f(9));
    }

    public function test_it_supports_primitives()
    {
        $this->assertTrue(p\either(true, true));
        $this->assertTrue(p\either(true, false));
        $this->assertFalse(p\either(false, false));
    }
}
