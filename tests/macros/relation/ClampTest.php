<?php

use const phln\relation\clamp;

class ClampTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return clamp;
    }

    /** @test */
    public function it_restricts_values_to_range()
    {
        $this->assertEquals(-1, $this->callFn(-1, 1, -100));
        $this->assertEquals(1, $this->callFn(-1, 1, 100));
        $this->assertEquals(0, $this->callFn(-1, 1, 0));
        $this->assertEquals(-1, $this->callFn(-1, 1, -1));
        $this->assertEquals(1, $this->callFn(-1, 1, 1));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(-1, 1);

        $this->assertEquals(0, $f(0));
        $this->assertEquals(1, $f(100));
    }
}
