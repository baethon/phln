<?php

use Baethon\Phln\Phln as P;

class FlatMapTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_flattens_mapped_array()
    {
        $duplicate = function($i) {
            return [$i, $i];
        };

        $this->assertEquals([1, 1, 2, 2], P::flatMap($duplicate, [1, 2]));
    }
}
