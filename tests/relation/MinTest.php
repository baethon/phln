<?php

use function phln\relation\min;

class MinTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_smaller_value()
    {
        $this->assertEquals(-1, min(-1, 1));
        $this->assertEquals(-1, min(1, -1));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = min(1);
        $this->assertEquals(-1, $f(-1));
    }
}
