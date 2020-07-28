<?php

use Baethon\Phln as p;

class PartialTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_builds_partial_of_function()
    {
        $f = function ($a, $b, $c) {
            return join(',', [$a, $b, $c]);
        };

        $g = p\partial($f, [2, 3]);

        $this->assertEquals('2,3,4', $g(4));
    }

    public function test_it_returns_function_even_for_full_arguments_applied()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = p\partial($f, [1, 2]);

        $this->assertEquals(3, $g());
    }
}
