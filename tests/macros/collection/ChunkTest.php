<?php

use Baethon\Phln\Phln as P;

class ChunkTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_splits_array_into_chunks()
    {
        $list = range(1, 10);
        $this->assertEquals(array_chunk($list, 3), P::chunk(3, $list));
    }

    public function test_it_splits_text_into_chunks()
    {
        $this->assertEquals(['lo', 're', 'm ', 'ip', 'su', 'm'], P::chunk(2, 'lorem ipsum'));
    }

    public function test_it_is_curried()
    {
        $split = P::chunk(2);
        $list = range(1, 10);
        $this->assertEquals(array_chunk($list, 2), $split($list));
    }
}
