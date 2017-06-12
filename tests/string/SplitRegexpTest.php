<?php

use const phln\string\splitRegexp;

class SplitRegexpTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return splitRegexp;
    }

    /** @test */
    public function it_splits_by_regexp()
    {
        $this->assertEquals(['a', 'b', 'c'], $this->callFn('/[,.]/', 'a,b.c'));
    }

    /** @test */
    public function it_is_curried()
    {
        $split = $this->callFn('/[,.]/');
        $this->assertEquals(['a', 'b', 'c'], $split('a,b.c'));
    }
}
