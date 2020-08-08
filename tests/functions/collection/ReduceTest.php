<?php

use Baethon\Phln as p;

class ReduceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_reduces_value()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $this->assertEquals(-10, p\reduce([1, 2, 3, 4], $f, 0));
    }
}
