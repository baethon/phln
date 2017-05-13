<?php

use function phln\string\splitRegexp;
use const phln\string\splitRegexp;

class SplitRegexpTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_splits_by_regexp()
    {
        $this->assertEquals(['a', 'b', 'c'], splitRegexp('/[,.]/', 'a,b.c'));
    }

    /** @test */
    public function it_is_curried()
    {
        $split = splitRegexp('/[,.]/');
        $this->assertEquals(['a', 'b', 'c'], $split('a,b.c'));
    }
}
