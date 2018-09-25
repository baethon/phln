<?php

use const phln\fn\swap;

class SwapTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return swap;
    }

    /** @test */
    public function it_swaps_first_two_arguments()
    {
        $f = function ($a, $b) {
            return "a:{$a},b:{$b}";
        };

        $this->assertEquals("a:2,b:1", $this->callFn($f)(1, 2));
    }
}
