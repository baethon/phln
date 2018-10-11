<?php

use Baethon\Phln\Phln as P;

class BothTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_two_predicates_are_true()
    {
        $p = function ($i) {
            return $i > 10;
        };
        $p2 = function($i) {
            return $i < 20;
        };

        $this->assertTrue(P::both($p, $p2)(11));
        $this->assertFalse(P::both($p, $p2)(10));
    }

    public function test_it_supports_primitives()
    {
        $this->assertTrue(P::both(true, true));
        $this->assertFalse(P::both(true, false));
    }
}
