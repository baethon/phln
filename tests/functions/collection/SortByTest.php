<?php

use Baethon\Phln as p;

class SortByTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_sorts_by_supplied_function()
    {
        $alice = ['name' => 'ALICE'];
        $bob = ['name' => 'bob'];
        $clara = ['name' => 'Clara'];
        $f = function ($item) {
            return strtolower($item['name']);
        };

        $this->assertEquals([$alice, $bob, $clara], p\sort_by([$clara, $bob, $alice], $f));
    }
}
