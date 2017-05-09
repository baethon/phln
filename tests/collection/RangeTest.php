<?php

use function phln\collection\range;

class RangeTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_generates_range()
    {
        $this->assertEquals([0, 1, 2, 3, 4], range(0, 5));
        $this->assertEquals([4, 3, 2, 1], range(4, 0));
        $this->assertEquals([], range(1, 1));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = range(0);
        $this->assertEquals([0, 1, 2, 3, 4], $f(5));
    }
}
