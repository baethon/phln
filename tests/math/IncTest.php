<?php

use function phln\math\inc;
use const phln\math\inc;

class IncTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_increments_value()
    {
        $this->assertEquals(3, inc(2));
    }

    /** @test */
    public function it_can_be_curried()
    {
        $g = inc();
        $this->assertEquals(3, $g(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3];
        $mapped = array_map(inc, $numbers);

        $this->assertEquals([2, 3, 4], $mapped);
    }
}
