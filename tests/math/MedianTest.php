<?php

use const phln\math\median;

class MedianTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return median;
    }

    /** @test */
    public function it_finds_median_of_odd_length_array()
    {
        $numbers = [7, 2, 9];
        $this->assertEquals(7, $this->callFn($numbers));
    }

    /** @test */
    public function it_finds_median_of_even_length_array()
    {
        $numbers = [7, 2, 10, 9];
        $this->assertEquals(8, $this->callFn($numbers));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn();
        $this->assertEquals(7, $f([7, 2, 9]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $result = call_user_func($this->getResolvedFn(), [7, 2, 9]);
        $this->assertEquals(7, $result);
    }
}
