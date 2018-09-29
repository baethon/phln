<?php

use Baethon\Phln\Phln as P;

class NoneTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_none_elements_match_predicament()
    {
        $p = function ($i) {
            return $i > 2;
        };

        $this->assertTrue(P::none($p, [1, 2]));
        $this->assertFalse(P::none($p, [1, 2, 3]));
    }

    public function test_it_is_curried()
    {
        $p = function ($i) {
            return $i > 2;
        };
        $g = P::none($p);
        $this->assertTrue($g([1, 2]));
    }
}
