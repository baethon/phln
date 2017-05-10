<?php

use function phln\collection\slice;

class SliceTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_slices_array()
    {
        $list = \range(1, 100);
        $this->assertEquals(array_slice($list, 4, 10), slice(4, 10, $list));
    }

    /** @test */
    public function it_is_curried()
    {
        $list = \range(1, 100);
        $slicer = slice(0, 5);
        $this->assertEquals(array_slice($list, 0, 5), $slicer($list));
    }
}
