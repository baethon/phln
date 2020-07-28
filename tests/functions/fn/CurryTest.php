<?php

use Baethon\Phln as p;

class CurryTest extends PHPUnit\Framework\TestCase
{
    public function test_it_curries_function()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = p\curry($sum);

        $this->assertEquals($expected, $g(1, 2, 3));
        $this->assertEquals($expected, $g(1)(2, 3));
        $this->assertEquals($expected, $g(1, 2)(3));
        $this->assertEquals($expected, $g(1)(2)(3));

        $this->assertEquals($expected, p\curry($sum, [1, 2, 3]));
    }
}
