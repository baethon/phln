<?php

use const phln\collection\prepend;

class PrependTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return prepend;
    }

    /** @test */
    public function it_prepends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals(['a', 1, 2], $this->callFn('a', $list));
        $this->assertEquals([['a'], 1, 2], $this->callFn(['a'], $list));
        $this->assertEquals([1, 2], $list);
    }

    /** @test */
    public function it_prepends_value_to_string()
    {
        $this->assertEquals('foobar', $this->callFn('foo', 'bar'));
    }

    /** @test */
    public function it_is_curried()
    {
        $prependFoo = $this->callFn('foo');
        $this->assertEquals(['foo', 1], $prependFoo([1]));
    }
}
