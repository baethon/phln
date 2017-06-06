<?php

use const phln\collection\reverse;

class ReverseTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return reverse;
    }

    /** @test */
    public function it_reverses_array()
    {
        $list = range(1, 10);
        $this->assertEquals(array_reverse($list), $this->callFn($list));
    }
}
