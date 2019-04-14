<?php

use Baethon\Phln\Phln as P;

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
        $h = P::compose([$f, $g]);

        $expected = $f($g(2, 3));
        $this->assertEquals($expected, $h(2, 3));
    }

    public function test_it_composes_one_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = P::compose([$f]);

        $this->assertEquals($f(2, 3), $g(2, 3));
    }

    public function test_it_fails_when_composing_without_functions()
    {
        $this->expectException(\UnderflowException::class);
        P::compose([]);
    }

    public function test_it_supports_variadics()
    {
        $f = function ($i) {
            return $i * 2;
        };
        $g = function ($a, $b) {
            return $a + $b;
        };
        $h = P::compose($f, $g);

        $expected = $f($g(2, 3));
        $this->assertEquals($expected, $h(2, 3));
    }
}
