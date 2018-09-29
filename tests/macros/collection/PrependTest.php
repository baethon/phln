<?php

use Baethon\Phln\Phln as P;

class PrependTest extends \PHPUnit\Framework\TestCase
{
    public function test_it_prepends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals(['a', 1, 2], P::prepend('a', $list));
        $this->assertEquals([['a'], 1, 2], P::prepend(['a'], $list));
        $this->assertEquals([1, 2], $list);
    }

    public function test_it_prepends_value_to_string()
    {
        $this->assertEquals('foobar', P::prepend('foo', 'bar'));
    }

    public function test_it_is_curried()
    {
        $prependFoo = P::prepend('foo');
        $this->assertEquals(['foo', 1], $prependFoo([1]));
    }
}
