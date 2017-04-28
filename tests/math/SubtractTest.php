<?php

use function phln\math\subtract;
use const phln\math\subtract;

class SubtractTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_subtracts_number()
    {
        $this->assertEquals(4, subtract(7, 3));
    }

    /** @test */
    public function it_is_curried()
    {
        $complementaryAngle = subtract(90);
        $this->assertEquals(30, $complementaryAngle(60));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [10, 4, 2];
        $result = array_reduce($numbers, subtract, 0);
        $this->assertEquals(-16, $result);
    }
}
