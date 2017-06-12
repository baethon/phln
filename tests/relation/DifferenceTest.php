<?php

use const phln\relation\difference;

class DifferenceTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return difference;
    }

    /** @test */
    public function it_returns_diff()
    {
        $a = [1, 2, 3, 4];
        $b = [1];

        $this->assertEquals([2, 3, 4], $this->callFn($a, $b));
    }

    /** @test */
    public function it_is_curried()
    {
        $diff = $this->callFn(range(1, 100));
        $expected = range(1, 49);

        $this->assertEquals($expected, $diff(range(50, 100)));
    }
}
