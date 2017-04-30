<?php

use function phln\collection\append;
use const phln\collection\append;

class AppendTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_appends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals([1, 2, 'a'], append('a', $list));
        $this->assertEquals([1, 2, ['a']], append(['a'], $list));
        $this->assertEquals([1, 2], $list);
    }

    /** @test */
    public function it_is_curried()
    {
        $appendFoo = append('foo');
        $this->assertEquals(['foo'], $appendFoo([]));
    }

    /** @test */
    public function it_can_be_used_as_callback()
    {
        $this->assertEquals(['foo'], call_user_func(append, 'foo', []));
    }
}
