<?php

use const phln\math\divide;

class DivideTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return divide;
    }

    /** @test */
    public function it_divides_values()
    {
        $this->assertEquals(1 / 2, $this->callFn(1, 2));
    }

    /** @test */
    public function it_can_be_curried()
    {
        $g = $this->callFn(1);
        $this->assertEquals(1 / 2, $g(2));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3];
        $reduced = array_reduce($numbers, $this->getResolvedFn(), 1);

        $this->assertEquals(1 / 2 / 3, $reduced);
    }
}
