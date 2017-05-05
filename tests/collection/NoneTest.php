<?php

use function phln\collection\none;

class NoneTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_none_elements_match_predicament()
    {
        $p = function ($i) {
            return $i > 2;
        };

        $this->assertTrue(none($p, [1, 2]));
        $this->assertFalse(none($p, [1, 2, 3]));
    }

    /** @test */
    public function it_is_curried()
    {
        $p = function ($i) {
            return $i > 2;
        };
        $g = none($p);
        $this->assertTrue($g([1, 2]));
    }
}
