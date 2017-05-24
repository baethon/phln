<?php

use function phln\relation\max;
use const phln\relation\max;

class MaxTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_bigger_value()
    {
        $this->assertEquals(1, max(-1, 1));
        $this->assertEquals(1, max(1, -1));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = max(1);
        $this->assertEquals(1, $f(-1));
    }
}
