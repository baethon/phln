<?php

use Baethon\Phln as p;

class SliceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_slices_array()
    {
        $list = \range(1, 100);
        $this->assertEquals(array_slice($list, 4, 10), p\slice($list, 4, 10));
    }

    public function test_it_slices_text()
    {
        $string = 'lorem ipsum dolor sit amet';
        $this->assertEquals('lorem', p\slice($string, 0, 5));
    }
}
