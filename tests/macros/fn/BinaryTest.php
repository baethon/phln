<?php

use Baethon\Phln\Phln as P;

class BinaryTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_converts_fn_to_binary_fn()
    {
        $f = function (...$args) {
            return $args;
        };

        $this->assertEquals([1, 2], P::binary($f)(1, 2, 3));
    }
}
