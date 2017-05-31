<?php

use function phln\collection\map;
use const phln\collection\map;

class MapTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_maps_array()
    {
        $fn = function ($i) {
            return $i * 100;
        };

        $this->assertEquals([100, 200], map($fn, [1, 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $f = map(function ($i) {
            return $i * 100;
        });

        $this->assertEquals([100, 200], $f([1, 2]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $fn = function ($i) {
            return $i * 100;
        };

        $this->assertEquals([100], call_user_func(map, $fn, [1]));
    }

    /** @test */
    public function it_passes_only_value()
    {
        $fn = function ($a, $b = null) {
            return compact('a', 'b');
        };

        $this->assertEquals([['a' => 1, 'b' => null]], map($fn, [1]));
    }
}
