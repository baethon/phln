<?php

namespace math;

use const phln\math\add;
use function phln\math\add;

class AddTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_adds_two_numbers()
    {
        $this->assertEquals(4, add(2, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $addFive = add(5);
        $this->assertEquals(7, $addFive(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3, 4];
        $sum = array_reduce($numbers, add);
        $this->assertEquals(10, $sum);
    }
}
