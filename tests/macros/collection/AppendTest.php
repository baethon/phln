<?php

use Baethon\Phln\Phln as P;

class AppendTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_appends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals([1, 2, 'a'], P::append('a', $list));
        $this->assertEquals([1, 2, ['a']], P::append(['a'], $list));
        $this->assertEquals([1, 2], $list);
    }

    public function test_it_appends_value_to_string()
    {
        $this->assertEquals('foobar', P::append('bar', 'foo'));
    }
}
