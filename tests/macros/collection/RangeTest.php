<?php

use const phln\collection\range;

class RangeTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return range;
    }

    /** @test */
    public function it_generates_range()
    {
        $this->assertEquals([0, 1, 2, 3, 4], $this->callFn(0, 5));
        $this->assertEquals([4, 3, 2, 1], $this->callFn(4, 0));
        $this->assertEquals([], $this->callFn(1, 1));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(0);
        $this->assertEquals([0, 1, 2, 3, 4], $f(5));
    }
}
