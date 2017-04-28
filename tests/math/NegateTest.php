<?php

use const phln\math\negate;
use function phln\math\negate;

class NegateTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_negates_number()
    {
        $this->assertEquals(4, negate(-4));
    }

    /** @test */
    public function it_is_curried()
    {
        $negate = negate();
        $this->assertEquals(-2, $negate(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3, 4];
        $result = array_map(negate, $numbers);
        $this->assertEquals([-1, -2, -3, -4], $result);
    }
}
