<?php

use function phln\collection\sortBy;

class SortByTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_sorts_by_supplied_function()
    {
        $alice = ['name' => 'ALICE'];
        $bob = ['name' => 'bob'];
        $clara = ['name' => 'Clara'];
        $f = function ($item) {
            return strtolower($item['name']);
        };

        $this->assertEquals([$alice, $bob, $clara], sortBy($f, [$clara, $bob, $alice]));

        return [$alice, $bob, $clara, $f];
    }

    /**
     * @test
     * @depends it_sorts_by_supplied_function
     */
    public function it_is_curried($payload)
    {
        list($alice, $bob, $clara, $f) = $payload;
        $sort = sortBy($f);

        $this->assertEquals([$alice, $bob, $clara], $sort([$bob, $clara, $alice]));
    }
}
