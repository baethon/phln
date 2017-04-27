<?php

use function phln\math\dec;
use const phln\math\dec;

class DecTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_decrements_value()
    {
        $this->assertEquals(1, dec(2));
    }

    /** @test */
    public function it_can_be_curried()
    {
        $g = dec();
        $this->assertEquals(1, $g(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3];
        $mapped = array_map(dec, $numbers);

        $this->assertEquals([0, 1, 2], $mapped);
    }
}
