<?php

use const phln\math\multiply;

class MultiplyTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return multiply;
    }

    /** @test */
    public function it_multiplies_two_numbers()
    {
        $this->assertEquals(4, $this->callFn(2, 2));
    }

    /** @test */
    public function it_is_curried()
    {
        $triple = $this->callFn(3);
        $this->assertEquals(6, $triple(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3, 4];
        $result = array_reduce($numbers, $this->getResolvedFn(), 1);
        $this->assertEquals(24, $result);
    }
}
