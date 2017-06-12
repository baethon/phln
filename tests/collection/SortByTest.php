<?php

use const phln\collection\sortBy;

class SortByTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return sortBy;
    }

    /** @test */
    public function it_sorts_by_supplied_function()
    {
        $alice = ['name' => 'ALICE'];
        $bob = ['name' => 'bob'];
        $clara = ['name' => 'Clara'];
        $f = function ($item) {
            return strtolower($item['name']);
        };

        $this->assertEquals([$alice, $bob, $clara], $this->callFn($f, [$clara, $bob, $alice]));

        return [$alice, $bob, $clara, $f];
    }

    /**
     * @test
     * @depends it_sorts_by_supplied_function
     */
    public function it_is_curried($payload)
    {
        list($alice, $bob, $clara, $f) = $payload;
        $sort = $this->callFn($f);

        $this->assertEquals([$alice, $bob, $clara], $sort([$bob, $clara, $alice]));
    }
}
