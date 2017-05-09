<?php

use function phln\collection\reduce;

class ReduceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_reduces_value()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $this->assertEquals(-10, reduce($f, 0, [1, 2, 3, 4]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = reduce(function ($a, $b) {
            return $a - $b;
        }, 0);

        $this->assertEquals(-10, $f([1, 2, 3, 4]));
    }
}
