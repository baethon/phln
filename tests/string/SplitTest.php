<?php

use function phln\string\split;
use const phln\string\split;

class SplitTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_splits_text_by_separator()
    {
        $this->assertEquals(['a', 'b'], split('/', 'a/b'));
    }

    /** @test */
    public function it_is_curried()
    {
        $split = split('/');
        $this->assertEquals(['a', 'b'], $split('a/b'));
    }
}
