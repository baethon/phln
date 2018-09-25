<?php

use const phln\math\sum;

class SumTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return sum;
    }

    /** @test  */
    public function it_sums_numbers_list()
    {
        $this->assertEquals(10, $this->callFn([1, 2, 3, 4]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3, 4];
        $this->assertEquals(10, call_user_func($this->getResolvedFn(), $numbers));
    }
}
