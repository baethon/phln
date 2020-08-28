<?php

use Baethon\Phln as p;

class MapIndexedTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_passes_keys_to_callback()
    {
        $fn = function ($i, $k) {
            return compact('i', 'k');
        };

        $expected = [['i' => 1, 'k' => 0]];
        $this->assertEquals($expected, p\map_indexed([1], $fn));
    }
}
