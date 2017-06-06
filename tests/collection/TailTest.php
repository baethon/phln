<?php

use const phln\collection\tail;

class TailTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return tail;
    }

    /** @test */
    public function it_returns_tail_of_array()
    {
        $this->assertEquals([2, 3, 4], $this->callFn([1, 2, 3, 4]));
        $this->assertEquals([], $this->callFn([1]));
        $this->assertEquals([], $this->callFn([]));
    }
}
