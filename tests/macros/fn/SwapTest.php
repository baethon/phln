<?php

use Baethon\Phln\Phln as P;

class SwapTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_swaps_first_two_arguments()
    {
        $f = function ($a, $b) {
            return "a:{$a},b:{$b}";
        };

        $this->assertEquals("a:2,b:1", P::swap($f)(1, 2));
    }
}
