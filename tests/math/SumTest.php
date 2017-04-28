<?php

use function phln\math\sum;
use const phln\math\sum;

class SumTest extends \PHPUnit_Framework_TestCase
{
    /** @test  */
    public function it_sums_numbers_list()
    {
        $this->assertEquals(10, sum([1, 2, 3, 4]));
    }

    /** @test */
    public function it_is_curried()
    {
        $sum = sum();
        $this->assertEquals(10, $sum([1, 2, 3, 4]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [1, 2, 3, 4];
        $this->assertEquals(10, call_user_func(sum, $numbers));
    }
}
