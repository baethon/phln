<?php

use Baethon\Phln as p;

class AppendTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_appends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals([1, 2, 'a'], p\append($list, 'a'));
        $this->assertEquals([1, 2, ['a']], p\append($list, ['a']));
        $this->assertEquals([1, 2], $list);
    }

    public function test_it_appends_value_to_string()
    {
        $this->assertEquals('foobar', p\append('foo', 'bar'));
    }
}
