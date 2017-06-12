<?php

use const phln\fn\partial;
use const phln\fn\__;

class PartialTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return partial;
    }

    /** @test */
    public function it_builds_partial_of_function()
    {
        $f = function ($a, $b, $c) {
            return join(',', [$a, $b, $c]);
        };

        $g = $this->callFn($f, [2, 3]);

        $this->assertEquals('2,3,4', $g(4));
    }

    /** @test */
    public function it_returns_function_even_for_full_arguments_applied()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = $this->callFn($f, [1, 2]);

        $this->assertEquals(3, $g());
    }

    /** @test */
    public function it_supports_placeholder()
    {
        $f = function ($a, $b) {
            return "$a-$b";
        };
        $g = $this->callFn($f, [__, 2]);

        $this->assertEquals('1-2', $g(1));
    }

    /** @test */
    public function it_supports_multiple_placeholders()
    {
        $f = function ($a, $b, $c) {
            return compact('a', 'b', 'c');
        };
        $g = $this->callFn($f, [__, 'b', __]);
        $expected = ['a' => 'A', 'b' => 'b', 'c' => 'C'];

        $this->assertEquals($expected, $g('A', 'C'));
    }

    /** @test */
    public function it_can_be_curried()
    {
        $factory = $this->callFn(\phln\math\add);
        $g = $factory([1]);
        $this->assertEquals(3, $g(2));
    }
}
