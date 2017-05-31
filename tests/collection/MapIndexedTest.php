<?php

use function phln\collection\mapIndexed;

class MapIndexedTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_passes_keys_to_callback()
    {
        $fn = function ($i, $k) {
            return compact('i', 'k');
        };

        $expected = [['i' => 1, 'k' => 0]];
        $this->assertEquals($expected, mapIndexed($fn, [1]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = mapIndexed(function ($i, $k) {
            return compact('i', 'k');
        });

        $this->assertEquals([['i' => 1, 'k' => 0]], $f([1]));
    }
}
