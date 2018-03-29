<?php

use const phln\fn\curryN;

class CurryNTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return curryN;
    }

    /** @test */
    public function it_curries_function()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = $this->callFn(3, $sum);

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
        $g = $this->callFn(3, $sum, [1, 2, 3]);

        $this->assertEquals($expected, $g);
    }

    /** @test */
    function it_filters_out_null_arguments()
    {
        $sum = function ($a, $b, $c) {
            return $a + $b + $c;
        };

        $expected = $sum(1, 2, 3);
        $g = $this->callFn(3, $sum, [null, null, 1]);

        $this->assertEquals($expected, $g(2, 3));
    }

    /** @test */
    function it_curries_until_n_is_matched()
    {
        $sum = function (... $args) {
            return array_sum($args);
        };

        $this->assertInstanceOf(\Closure::class, $this->callFn(3, $sum));
        $this->assertInstanceOf(\Closure::class, $this->callFn(3, $sum, [1]));
        $this->assertInstanceOf(\Closure::class, $this->callFn(3, $sum, [1, 2]));
        $this->assertEquals(6, $this->callFn(3, $sum, [1, 2, 3]));
    }
}
