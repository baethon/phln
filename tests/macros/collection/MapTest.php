<?php

use Baethon\Phln\Phln as P;
use Baethon\Phln\Monad\Identity;

class MapTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_maps_array()
    {
        $fn = function ($i) {
            return $i * 100;
        };

        $this->assertEquals([100, 200], P::map($fn, [1, 2]));
    }

    public function test_it_passes_only_value()
    {
        $fn = function ($a, $b = null) {
            return compact('a', 'b');
        };

        $this->assertEquals([['a' => 1, 'b' => null]], P::map($fn, [1]));
    }

    public function test_it_works_with_functors()
    {
        $a = Identity::of('foo');

        $fn = function ($value) {
            return "${value}_foo";
        };

        $expected = $a->map($fn);

        $this->assertEquals($expected, P::map($fn, $a));
    }
}
