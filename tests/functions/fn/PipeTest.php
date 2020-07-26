<?php

use baethon\phln as p;

class PipeTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_composes_functions()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = function ($i) {
            return $i * 2;
        };
        $h = p\pipe([$f, $g]);

        $expected = $g($f(2, 3));
        $this->assertEquals($expected, $h(2, 3));
    }

    public function test_it_composes_one_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = p\pipe([$f]);

        $this->assertEquals($f(2, 3), $g(2, 3));
    }

    public function test_it_supports_variadics()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = function ($i) {
            return $i * 2;
        };
        $h = p\pipe($f, $g);

        $expected = $g($f(2, 3));
        $this->assertEquals($expected, $h(2, 3));
    }
}
