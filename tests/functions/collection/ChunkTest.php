<?php

use Baethon\Phln as p;

class ChunkTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_splits_array_into_chunks()
    {
        $list = range(1, 10);
        $this->assertEquals(array_chunk($list, 3), p\chunk($list, 3));
    }

    public function test_it_splits_text_into_chunks()
    {
        $this->assertEquals(['lo', 're', 'm ', 'ip', 'su', 'm'], p\chunk('lorem ipsum', 2));
    }
}
