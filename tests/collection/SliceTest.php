<?php

use const phln\collection\slice;

class SliceTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return slice;
    }

    /** @test */
    public function it_slices_array()
    {
        $list = \range(1, 100);
        $this->assertEquals(array_slice($list, 4, 10), $this->callFn(4, 10, $list));
    }

    /** @test */
    public function it_is_curried()
    {
        $list = \range(1, 100);
        $slicer = $this->callFn(0, 5);
        $this->assertEquals(array_slice($list, 0, 5), $slicer($list));
    }
}
