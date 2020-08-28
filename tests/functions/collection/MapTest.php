<?php

use Baethon\Phln as p;
use Baethon\Phln\Monad\Identity;

class MapTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_maps_array()
    {
        $fn = function ($i) {
            return $i * 100;
        };

        $this->assertEquals([100, 200], p\map([1, 2], $fn));
    }

    public function test_it_passes_only_value()
    {
        $fn = function ($a, $b = null) {
            return compact('a', 'b');
        };

        $this->assertEquals([['a' => 1, 'b' => null]], p\map([1], $fn));
    }

    public function test_it_works_with_functors()
    {
        $a = Identity::of('foo');

        $fn = function ($value) {
            return "${value}_foo";
        };

        $expected = $a->map($fn);

        $this->assertEquals($expected, p\map($a, $fn));
    }
}
