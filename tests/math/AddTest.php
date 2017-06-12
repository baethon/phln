<?php

use const phln\math\add;

class AddTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return add;
    }

    /** @test */
    public function it_adds_two_numbers()
    {
        $this->assertEquals(4, $this->callFn(2, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $addFive = $this->callFn(5);
        $this->assertEquals(7, $addFive(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3, 4];
        $sum = array_reduce($numbers, $this->getResolvedFn());
        $this->assertEquals(10, $sum);
    }
}
