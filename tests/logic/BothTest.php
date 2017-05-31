<?php

use function phln\logic\both;

class BothTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_checks_if_two_predicates_are_true()
    {
        $p = function ($i) {
            return $i > 10;
        };
        $p2 = function($i) {
            return $i < 20;
        };

        $this->assertTrue(both($p, $p2)(11));
        $this->assertFalse(both($p, $p2)(10));
    }

    /** @test */
    public function it_is_curried()
    {
        $p = both(function ($i) {
            return $i > 10;
        });

        $p2 = function ($i) {
            return $i < 20;
        };

        $this->assertTrue($p($p2)(11));
        $this->assertFalse($p($p2)(10));
    }
}
