<?php

use Baethon\Phln as p;

class FlatMapTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_flattens_mapped_array()
    {
        $duplicate = function($i) {
            return [$i, $i];
        };

        $this->assertEquals([1, 1, 2, 2], p\flat_map([1, 2], $duplicate));
    }
}
