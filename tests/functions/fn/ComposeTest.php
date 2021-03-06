<?php

use Baethon\Phln as p;

class ComposeTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_composes_functions()
    {
        $f = function ($i) {
            return $i * 2;
        };
        $g = function ($a, $b) {
            return $a + $b;
        };
        $h = p\compose([$f, $g]);

        $expected = $f($g(2, 3));
        $this->assertEquals($expected, $h(2, 3));
    }

    public function test_it_composes_one_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = p\compose([$f]);

        $this->assertEquals($f(2, 3), $g(2, 3));
    }

    public function test_it_supports_variadics()
    {
        $f = function ($i) {
            return $i * 2;
        };
        $g = function ($a, $b) {
            return $a + $b;
        };
        $h = p\compose($f, $g);

        $expected = $f($g(2, 3));
        $this->assertEquals($expected, $h(2, 3));
    }
}
