<?php

use const phln\math\subtract;

class SubtractTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return subtract;
    }

    /** @test */
    public function it_subtracts_number()
    {
        $this->assertEquals(4, $this->callFn(7, 3));
    }

    /** @test */
    public function it_is_curried()
    {
        $complementaryAngle = $this->callFn(90);
        $this->assertEquals(30, $complementaryAngle(60));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [10, 4, 2];
        $result = array_reduce($numbers, $this->getResolvedFn(), 0);
        $this->assertEquals(-16, $result);
    }
}
