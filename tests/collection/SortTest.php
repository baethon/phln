<?php

use function phln\collection\sort;

class SortTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_sorts_ascending()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $this->assertEquals([1, 2, 3], sort($f, [3, 1, 2]));
    }

    /** @test */
    public function it_sorts_descending()
    {
        $f = function ($a, $b) {
            return $b - $a;
        };

        $this->assertEquals([3, 2, 1], sort($f, [1, 2, 3]));
    }

    /** @test */
    public function it_doesnt_sort()
    {
        $f = function () {
            return 0;
        };

        $this->assertEquals([3, 1, 2], sort($f, [3, 1, 2]));
    }

    /** @test */
    public function it_returns_array_copy()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $list = [3, 1, 2];
        sort($f, $list);

        $this->assertEquals([3, 1, 2], $list);
    }

    /** @test */
    public function it_is_curried()
    {
        $sort = sort(function ($a, $b) {
            return $a - $b;
        });

        $this->assertEquals([1, 2, 3], $sort([3, 2, 1]));
    }
}
