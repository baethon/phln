<?php

use Baethon\Phln\Phln as P;

class FilterTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_filters_array()
    {
        $p = function ($i) {
            return $i > 2;
        };

        $this->assertEquals([3, 4], P::filter($p, [1, 2, 3, 4]));
    }
}
