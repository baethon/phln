<?php

use Baethon\Phln\Phln as P;

class AnyTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_checks_if_any_element_of_array_match_predicate()
    {
        $predicate = function ($i) {
            return $i > 4;
        };

        $this->assertTrue(P::any($predicate, [1, 2, 4, 5]));
        $this->assertFalse(P::any($predicate, [1, 2]));
    }

    public function test_it_is_curried()
    {
        $f = P::any(function ($i) {
            return $i > 2;
        });

        $this->assertTrue($f([1, 2, 3]));
    }
}
