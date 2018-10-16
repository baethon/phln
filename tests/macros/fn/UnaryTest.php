<?php

use Baethon\Phln\Phln as P;

class UnaryTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_converts_fn_to_unary_fn()
    {
        $f = function (...$args) {
            return $args;
        };

        $this->assertEquals([1], P::unary($f)(1, 2, 3));
    }
}
