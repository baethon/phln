<?php

use Baethon\Phln as p;

class BinaryTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_converts_fn_to_binary_fn()
    {
        $f = function (...$args) {
            return $args;
        };

        $this->assertEquals([1, 2], p\binary($f)(1, 2, 3));
    }
}
