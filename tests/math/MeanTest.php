<?php

use const phln\math\mean;

class MeanTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return mean;
    }

    /** @test */
    public function it_returns_mean_of_numbers()
    {
        $numbers = [2, 7, 9];
        $this->assertEquals(6, $this->callFn($numbers));
    }

    /** @test */
    public function it_can_is_curried()
    {
        $numbers = [2, 7, 9];
        $f = $this->callFn();

        $this->assertEquals(6, $f($numbers));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [2, 7, 9];
        $mean = call_user_func($this->getResolvedFn(), $numbers);

        $this->assertEquals(6, $mean);
    }
}
