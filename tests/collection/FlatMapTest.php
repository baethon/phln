<?php

use function phln\collection\flatMap;
use const phln\collection\flatMap;

class FlatMapTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return flatMap;
    }

    /** @test */
    public function it_flattens_mapped_array()
    {
        $duplicate = function($i) {
            return [$i, $i];
        };

        $this->assertEquals([1, 1, 2, 2], $this->callFn($duplicate, [1, 2]));
    }

    /** @test */
    public function it_is_curried()
    {
        $map = $this->callFn(function ($i) {
            return [$i, $i];
        });

        $this->assertEquals([1, 1, 2, 2], $map([1, 2]));
    }
}
