<?php

use Baethon\Phln as p;

class CurryNTest extends PHPUnit\Framework\TestCase
{
    public function test_it_curries_function()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = p\curry_n(3, $sum);

        $this->assertEquals($expected, $g(1, 2, 3));
        $this->assertEquals($expected, $g(1)(2, 3));
        $this->assertEquals($expected, $g(1, 2)(3));
        $this->assertEquals($expected, $g(1)(2)(3));

        $this->assertEquals($expected, p\curry_n(3, $sum, [1, 2, 3]));
    }
}
