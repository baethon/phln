<?php

use function phln\collection\head;
use const phln\collection\head;

class HeadTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return head;
    }

    /** @test */
    public function it_returns_head_of_array()
    {
        $this->assertEquals(1, $this->callFn([1, 2, 3]));
        $this->assertEquals(1, $this->callFn([1]));
        $this->assertNull($this->callFn([]));
    }

    /** @test */
    public function it_returs_head_of_string()
    {
        $this->assertEquals('f', $this->callFn('foo'));
        $this->assertEquals('f', $this->callFn('f'));
        $this->assertEquals('', $this->callFn(''));
    }
}
