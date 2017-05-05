<?php

use function phln\collection\filter;

class FilterTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_filters_array()
    {
        $p = function ($i) {
            return $i > 2;
        };

        $this->assertEquals([3, 4], filter($p, [1, 2, 3, 4]));
    }

    /** @test */
    public function it_is_curried()
    {
        $filter = filter(function ($i) {
            return $i > 2;
        });

        $this->assertEquals([3, 4], $filter([1, 2, 3, 4]));
    }
}
