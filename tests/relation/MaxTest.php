<?php

use const phln\relation\max;

class MaxTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return max;
    }

    /** @test */
    public function it_returns_bigger_value()
    {
        $this->assertEquals(1, $this->callFn(-1, 1));
        $this->assertEquals(1, $this->callFn(1, -1));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(1);
        $this->assertEquals(1, $f(-1));
    }
}
