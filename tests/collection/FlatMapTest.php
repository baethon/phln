<?php

use function phln\collection\flatMap;
use const phln\collection\flatMap;

class FlatMapTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_flattens_mapped_array()
    {
        $duplicate = function($i) {
            return [$i, $i];
        };

        $this->assertEquals([1, 1, 2, 2], flatMap($duplicate, [1, 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $map = flatMap(function ($i) {
            return [$i, $i];
        });

        $this->assertEquals([1, 1, 2, 2], $map([1, 2]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $duplicate = function ($i) {
            return [$i, $i];
        };
        $result = call_user_func(flatMap, $duplicate, [1, 2]);

        $this->assertEquals([1, 1, 2, 2], $result);
    }
}
