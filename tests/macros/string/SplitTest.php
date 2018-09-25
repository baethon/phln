<?php

use phln\RegExp;
use const phln\string\split;

class SplitTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return split;
    }

    /** @test */
    public function it_splits_text_by_separator()
    {
        $this->assertEquals(['a', 'b'], $this->callFn('/', 'a/b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $split = $this->callFn('/');
        $this->assertEquals(['a', 'b'], $split('a/b'));
    }

    /** @test */
    public function it_splits_by_regex()
    {
        $this->assertEquals(['a', 'b'], $this->callFn(RegExp::fromString('|'), 'a|b'));
    }
}
