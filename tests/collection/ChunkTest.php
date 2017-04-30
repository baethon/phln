<?php

use function phln\collection\chunk;
use const phln\collection\chunk;

class ChunkTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_splits_array_into_chunks()
    {
        $list = range(1, 10);
        $this->assertEquals(array_chunk($list, 3), chunk(3, $list));
    }

    /** @test */
    public function it_is_curried()
    {
        $split = chunk(2);
        $list = range(1, 10);
        $this->assertEquals(array_chunk($list, 2), $split($list));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $list = range(1, 10);
        $expected = array_chunk($list, 2);
        $this->assertEquals($expected, call_user_func(chunk, 2, $list));
    }
}
