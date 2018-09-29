<?php

use Baethon\Phln\Phln as P;

class SliceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_slices_array()
    {
        $list = \range(1, 100);
        $this->assertEquals(array_slice($list, 4, 10), P::slice(4, 10, $list));
    }

    public function test_it_is_curried()
    {
        $list = \range(1, 100);
        $slicer = P::slice(0, 5);
        $this->assertEquals(array_slice($list, 0, 5), $slicer($list));
    }

    public function test_it_slices_text()
    {
        $string = 'lorem ipsum dolor sit amet';
        $this->assertEquals('lorem', P::slice(0, 5, $string));
    }
}
