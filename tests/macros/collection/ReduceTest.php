<?php

use Baethon\Phln\Phln as P;

class ReduceTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_reduces_value()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $this->assertEquals(-10, P::reduce($f, 0, [1, 2, 3, 4]));
    }
}
