<?php

use Baethon\Phln\Phln as P;

class MapIndexedTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_passes_keys_to_callback()
    {
        $fn = function ($i, $k) {
            return compact('i', 'k');
        };

        $expected = [['i' => 1, 'k' => 0]];
        $this->assertEquals($expected, P::mapIndexed($fn, [1]));
    }

    public function test_it_is_curried()
    {
        $f = P::mapIndexed(function ($i, $k) {
            return compact('i', 'k');
        });

        $this->assertEquals([['i' => 1, 'k' => 0]], $f([1]));
    }
}
