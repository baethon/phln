<?php

use const phln\fn\curry;

class CurryTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return curry;
    }

    /** @test */
    public function it_curries_function()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = $this->callFn($sum);

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
        $g = $this->callFn($sum, [1, 2, 3]);

        $this->assertEquals($expected, $g);
    }

    /** @test */
    function it_filters_out_nil_arguments()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = $this->callFn($sum, [\phln\fn\nil, \phln\fn\nil, 1]);

        $this->assertEquals($expected, $g(2, 3));
    }
}
