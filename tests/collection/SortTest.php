<?php

use const phln\collection\sort;

class SortTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return sort;
    }

    /** @test */
    public function it_sorts_ascending()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $this->assertEquals([1, 2, 3], $this->callFn($f, [3, 1, 2]));
    }

    /** @test */
    public function it_sorts_descending()
    {
        $f = function ($a, $b) {
            return $b - $a;
        };

        $this->assertEquals([3, 2, 1], $this->callFn($f, [1, 2, 3]));
    }

    /** @test */
    public function it_doesnt_sort()
    {
        $f = function () {
            return 0;
        };

        $this->assertEquals([3, 1, 2], $this->callFn($f, [3, 1, 2]));
    }

    /** @test */
    public function it_returns_array_copy()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $list = [3, 1, 2];
        $this->callFn($f, $list);

        $this->assertEquals([3, 1, 2], $list);
    }

    /** @test */
    public function it_is_curried()
    {
        $sort = $this->callFn(function ($a, $b) {
            return $a - $b;
        });

        $this->assertEquals([1, 2, 3], $sort([3, 2, 1]));
    }
}
