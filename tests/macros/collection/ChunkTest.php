<?php

use function phln\collection\chunk;
use const phln\collection\chunk;

class ChunkTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return chunk;
    }

    /** @test */
    public function it_splits_array_into_chunks()
    {
        $list = range(1, 10);
        $this->assertEquals(array_chunk($list, 3), $this->callFn(3, $list));
    }

    /** @test */
    public function it_splits_text_into_chunks()
    {
        $this->assertEquals(['lo', 're', 'm ', 'ip', 'su', 'm'], $this->callFn(2, 'lorem ipsum'));
    }

    /** @test */
    public function it_is_curried()
    {
        $split = $this->callFn(2);
        $list = range(1, 10);
        $this->assertEquals(array_chunk($list, 2), $split($list));
    }
}
