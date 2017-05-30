<?php

use function phln\relation\difference;

class DifferenceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_diff()
    {
        $a = [1, 2, 3, 4];
        $b = [1];

        $this->assertEquals([2, 3, 4], difference($a, $b));
    }

    /** @test */
    public function it_is_curried()
    {
        $diff = difference(range(1, 100));
        $expected = range(1, 49);

        $this->assertEquals($expected, $diff(range(50, 100)));
    }
}
