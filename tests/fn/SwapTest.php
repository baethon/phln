<?php

use function phln\fn\swap;
use const phln\fn\swap;

class SwapTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_swaps_first_two_arguments()
    {
        $f = function ($a, $b) {
            return "a:{$a},b:{$b}";
        };

        $this->assertEquals("a:2,b:1", swap($f)(1, 2));
    }
}
