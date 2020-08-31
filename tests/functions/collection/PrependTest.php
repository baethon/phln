<?php

use Baethon\Phln as p;

class PrependTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_prepends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals(['a', 1, 2], p\prepend($list, 'a'));
        $this->assertEquals([['a'], 1, 2], p\prepend($list, ['a']));
        $this->assertEquals($list, [1, 2]);
    }

    public function test_it_prepends_value_to_string()
    {
        $this->assertEquals('foobar', p\prepend('bar', 'foo'));
    }
}
