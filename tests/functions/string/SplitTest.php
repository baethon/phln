<?php

use Baethon\Phln\RegExp;
use Baethon\Phln as p;

class SplitTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_splits_text_by_separator()
    {
        $this->assertEquals(['a', 'b'], p\split('a/b', '/'));
    }

    public function test_it_splits_by_regex()
    {
        $this->assertEquals(['a', 'b'], p\split('a|b', RegExp::fromString('|')));
    }
}
