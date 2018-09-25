<?php

use Baethon\Phln\Phln as P;

class PartialTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_builds_partial_of_function()
    {
        $f = function ($a, $b, $c) {
            return join(',', [$a, $b, $c]);
        };

        $g = P::partial($f, [2, 3]);

        $this->assertEquals('2,3,4', $g(4));
    }

    public function test_it_returns_function_even_for_full_arguments_applied()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = P::partial($f, [1, 2]);

        $this->assertEquals(3, $g());
    }

    public function test_it_supports_placeholder()
    {
        $f = function ($a, $b) {
            return "$a-$b";
        };
        $g = P::partial($f, [P::__, 2]);

        $this->assertEquals('1-2', $g(1));
    }

    public function test_it_supports_multiple_placeholders()
    {
        $f = function ($a, $b, $c) {
            return compact('a', 'b', 'c');
        };
        $g = P::partial($f, [P::__, 'b', P::__]);
        $expected = ['a' => 'A', 'b' => 'b', 'c' => 'C'];

        $this->assertEquals($expected, $g('A', 'C'));
    }

    public function test_it_can_be_curried()
    {
        $factory = P::partial(function ($a, $b) {
            return $a + $b;
        });
        $g = $factory([1]);
        $this->assertEquals(3, $g(2));
    }
}
