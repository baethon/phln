<?php

use Baethon\Phln\Phln as P;

class CurryNTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_curries_function()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = P::curryN(3, $sum);

        $this->assertEquals($expected, $g(1, 2, 3));
        $this->assertEquals($expected, $g(1)(2, 3));
        $this->assertEquals($expected, $g(1, 2)(3));
        $this->assertEquals($expected, $g(1)(2)(3));
    }

    function test_it_returns_value_when_arguments_lenght_is_equal_to_parameters()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };
        $expected = $sum(1, 2, 3);
        $g = P::curryN(3, $sum, [1, 2, 3]);

        $this->assertEquals($expected, $g);
    }

    function test_it_curries_until_n_is_matched()
    {
        $sum = function (... $args) {
            return array_sum($args);
        };

        $this->assertInstanceOf(\Closure::class, P::curryN(3, $sum));
        $this->assertInstanceOf(\Closure::class, P::curryN(3, $sum, [1]));
        $this->assertInstanceOf(\Closure::class, P::curryN(3, $sum, [1, 2]));
        $this->assertEquals(6, P::curryN(3, $sum, [1, 2, 3]));
    }
}
