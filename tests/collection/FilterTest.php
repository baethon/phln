<?php

use const phln\collection\filter;

class FilterTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return filter;
    }

    /** @test */
    public function it_filters_array()
    {
        $p = function ($i) {
            return $i > 2;
        };

        $this->assertEquals([3, 4], $this->callFn($p, [1, 2, 3, 4]));
    }

    /** @test */
    public function it_is_curried()
    {
        $filter = $this->callFn(function ($i) {
            return $i > 2;
        });

        $this->assertEquals([3, 4], $filter([1, 2, 3, 4]));
    }
}
