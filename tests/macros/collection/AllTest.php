<?php

use Baethon\Phln\Phln as P;

class AllTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_all_elements_match_predicate()
    {
        $list = [2, 4, 6, 8];
        $predicate = function ($i) {
            return $i % 2 === 0;
        };

        $this->assertTrue(P::all($predicate, $list));
        $this->assertFalse(P::all($predicate, [2, 4, 5]));
    }

    public function test_it_is_curried()
    {
        $f = P::all(function ($i) {
            return $i % 2 === 0;
        });

        $this->assertTrue($f([2, 4, 6, 8]));
    }
}
