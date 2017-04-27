<?php

use function phln\math\median;
use const phln\math\median;

class MedianTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_finds_median_of_odd_length_array()
    {
        $numbers = [7, 2, 9];
        $this->assertEquals(7, median($numbers));
    }

    /** @test */
    public function it_finds_median_of_even_length_array()
    {
        $numbers = [7, 2, 10, 9];
        $this->assertEquals(8, median($numbers));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = median();
        $this->assertEquals(7, $f([7, 2, 9]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $result = call_user_func(median, [7, 2, 9]);
        $this->assertEquals(7, $result);
    }
}
