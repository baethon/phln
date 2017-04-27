<?php

use const phln\math\mean;
use function phln\math\mean;

class MeanTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_returns_mean_of_numbers()
    {
        $numbers = [2, 7, 9];
        $this->assertEquals(6, mean($numbers));
    }

    /** @test */
    public function it_can_is_curried()
    {
        $numbers = [2, 7, 9];
        $f = mean();

        $this->assertEquals(6, $f($numbers));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $numbers = [2, 7, 9];
        $mean = call_user_func(mean, $numbers);

        $this->assertEquals(6, $mean);
    }
}
