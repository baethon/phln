<?php

use Baethon\Phln\Phln as P;

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

        $f = P::either($p, $p2);

        $this->assertTrue($f(11));
        $this->assertTrue($f(2));
        $this->assertFalse($f(3));
        $this->assertFalse($f(9));
    }

    public function test_it_supports_primitives()
    {
        $this->assertTrue(P::either(true, true));
        $this->assertTrue(P::either(true, false));
        $this->assertFalse(P::either(false, false));
    }
}
