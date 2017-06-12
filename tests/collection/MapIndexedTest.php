<?php

use const phln\collection\mapIndexed;

class MapIndexedTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return mapIndexed;
    }

    /** @test */
    public function it_passes_keys_to_callback()
    {
        $fn = function ($i, $k) {
            return compact('i', 'k');
        };

        $expected = [['i' => 1, 'k' => 0]];
        $this->assertEquals($expected, $this->callFn($fn, [1]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = $this->callFn(function ($i, $k) {
            return compact('i', 'k');
        });

        $this->assertEquals([['i' => 1, 'k' => 0]], $f([1]));
    }
}
