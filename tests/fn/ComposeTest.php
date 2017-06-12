<?php

use const phln\fn\compose;

class ComposeTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return compose;
    }

    /** @test */
    public function it_composes_functions()
    {
        $f = function ($i) {
            return $i * 2;
        };
        $g = function ($a, $b) {
            return $a + $b;
        };
        $h = $this->callFn($f, $g);

        $expected = $f($g(2, 3));
        $this->assertEquals($expected, $h(2, 3));
    }

    /** @test */
    public function it_composes_one_function()
    {
        $f = function ($a, $b) {
            return $a + $b;
        };
        $g = $this->callFn($f);

        $this->assertEquals($f(2, 3), $g(2, 3));
    }

    /** @test */
    public function it_fails_when_composing_without_functions()
    {
        $this->expectException(\UnderflowException::class);
        $this->callFn();
    }
}
