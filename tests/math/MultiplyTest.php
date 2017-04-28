<?php

use const phln\math\multiply;
use function phln\math\multiply;

class MultiplyTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_multiplies_two_numbers()
    {
        $this->assertEquals(4, multiply(2, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $triple = multiply(3);
        $this->assertEquals(6, $triple(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3, 4];
        $result = array_reduce($numbers, multiply, 1);
        $this->assertEquals(24, $result);
    }
}
