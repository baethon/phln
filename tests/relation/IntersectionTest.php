<?php

use function phln\relation\intersection;

class IntersectionTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_calculates_intersection()
    {
        $a = [1, 2, 3, 4, 5];
        $b = [5, 2, 7];

        $this->assertEquals([2, 5], intersection($a, $b));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = intersection([1, 2, 3, 4]);
        $this->assertEquals([4], $f([6, 7, 8, 4]));
    }
}
