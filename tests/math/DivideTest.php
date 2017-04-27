<?php

use function phln\math\divide;
use const phln\math\divide;

class DivideTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_divides_values()
    {
        $this->assertEquals(1 / 2, divide(1, 2));
    }

    /** @test */
    public function it_can_be_curried()
    {
        $g = divide(1);
        $this->assertEquals(1 / 2, $g(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3];
        $reduced = array_reduce($numbers, divide, 1);

        $this->assertEquals(1 / 2 / 3, $reduced);
    }
}
