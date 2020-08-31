<?php

use Baethon\Phln as p;

class SortTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_sorts_ascending()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $this->assertEquals([1, 2, 3], p\sort([3, 1, 2], $f));
    }

    public function test_it_sorts_descending()
    {
        $f = function ($a, $b) {
            return $b - $a;
        };

        $this->assertEquals([3, 2, 1], p\sort([1, 2, 3], $f));
    }

    public function test_it_doesnt_sort()
    {
        $f = function () {
            return 0;
        };

        $this->assertEquals([3, 1, 2], p\sort([3, 1, 2], $f));
    }

    public function test_it_returns_array_copy()
    {
        $f = function ($a, $b) {
            return $a - $b;
        };

        $list = [3, 1, 2];
        p\sort($list, $f);

        $this->assertEquals([3, 1, 2], $list);
    }
}
