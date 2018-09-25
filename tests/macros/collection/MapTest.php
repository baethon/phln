<?php

use Baethon\Phln\Phln as P;

class MapTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_maps_array()
    {
        $fn = function ($i) {
            return $i * 100;
        };

        $this->assertEquals([100, 200], P::map($fn, [1, 2]));
    }

    public function test_it_is_curried()
    {
        $f = P::map(function ($i) {
            return $i * 100;
        });

        $this->assertEquals([100, 200], $f([1, 2]));
    }

    public function test_it_passes_only_value()
    {
        $fn = function ($a, $b = null) {
            return compact('a', 'b');
        };

        $this->assertEquals([['a' => 1, 'b' => null]], P::map($fn, [1]));
    }
}
