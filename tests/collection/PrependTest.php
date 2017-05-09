<?php

use function phln\collection\prepend;

class PrependTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function it_prepends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals(['a', 1, 2], prepend('a', $list));
        $this->assertEquals([['a'], 1, 2], prepend(['a'], $list));
        $this->assertEquals([1, 2], $list);
    }

    /** @test */
    public function it_is_curried()
    {
        $prependFoo = prepend('foo');
        $this->assertEquals(['foo', 1], $prependFoo([1]));
    }
}
