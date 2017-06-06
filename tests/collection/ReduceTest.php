<?php

use const phln\collection\reduce;

class ReduceTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return reduce;
    }

    /** @test */
    public function it_reduces_value()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $this->assertEquals(-10, $this->callFn($f, 0, [1, 2, 3, 4]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(function ($a, $b) {
            return $a - $b;
        }, 0);

        $this->assertEquals(-10, $f([1, 2, 3, 4]));
    }
}
