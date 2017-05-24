<?php

use function phln\relation\clamp;

class ClampTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_restricts_values_to_range()
    {
        $this->assertEquals(-1, clamp(-1, 1, -100));
        $this->assertEquals(1, clamp(-1, 1, 100));
        $this->assertEquals(0, clamp(-1, 1, 0));
        $this->assertEquals(-1, clamp(-1, 1, -1));
        $this->assertEquals(1, clamp(-1, 1, 1));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = clamp(-1, 1);

        $this->assertEquals(0, $f(0));
        $this->assertEquals(1, $f(100));
    }
}
