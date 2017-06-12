<?php

use const phln\relation\intersection;

class IntersectionTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return intersection;
    }

    /** @test */
    public function it_calculates_intersection()
    {
        $a = [1, 2, 3, 4, 5];
        $b = [5, 2, 7];

        $this->assertEquals([2, 5], $this->callFn($a, $b));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn([1, 2, 3, 4]);
        $this->assertEquals([4], $f([6, 7, 8, 4]));
    }
}
