<?php

use Baethon\Phln\Phln as P;

class RangeTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_generates_range()
    {
        $this->assertEquals([0, 1, 2, 3, 4], P::range(0, 5));
        $this->assertEquals([4, 3, 2, 1], P::range(4, 0));
        $this->assertEquals([], P::range(1, 1));
    }
}
