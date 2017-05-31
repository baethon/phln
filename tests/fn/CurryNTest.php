<?php

use function phln\fn\curryN;

class CurryNTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_curries_function()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = curryN(3, $sum);

        $this->assertEquals($expected, $g(1, 2, 3));
        $this->assertEquals($expected, $g(1)(2, 3));
        $this->assertEquals($expected, $g(1, 2)(3));
        $this->assertEquals($expected, $g(1)(2)(3));
    }

    /** @test */
    function it_returns_value_when_arguments_lenght_is_equal_to_parameters()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };
        $expected = $sum(1, 2, 3);
        $g = curryN(3, $sum, 1, 2, 3);

        $this->assertEquals($expected, $g);
    }

    /** @test */
    function it_filters_out_nil_arguments()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = curryN(3, $sum, \phln\fn\nil, \phln\fn\nil, 1);

        $this->assertEquals($expected, $g(2, 3));
    }

    /** @test */
    function it_curries_until_n_is_matched()
    {
        $sum = function (... $args) {
            return array_sum($args);
        };

        $this->assertInstanceOf(\Closure::class, curryN(3, $sum));
        $this->assertInstanceOf(\Closure::class, curryN(3, $sum, 1));
        $this->assertInstanceOf(\Closure::class, curryN(3, $sum, 1, 2));
        $this->assertEquals(6, curryN(3, $sum, 1, 2, 3));
    }
}
