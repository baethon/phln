<?php

use function phln\collection\init;
use const phln\collection\init;

class InitTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return init;
    }

    /** @test */
    public function it_returns_list_without_last_element()
    {
        $this->assertEquals([1, 2], $this->callFn([1, 2, 3]));
        $this->assertEquals([1], $this->callFn([1, 2]));
        $this->assertEquals([], $this->callFn([1]));
        $this->assertEquals([], $this->callFn([]));
    }
}
