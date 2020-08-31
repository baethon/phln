<?php

use Baethon\Phln as p;

class RangeTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_generates_range()
    {
        $this->assertEquals([0, 1, 2, 3, 4], p\range(0, 5));
        $this->assertEquals([4, 3, 2, 1], p\range(4, 0));
        $this->assertEquals([], p\range(1, 1));
    }
}
