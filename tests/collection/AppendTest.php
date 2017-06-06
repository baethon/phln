<?php

use function phln\collection\append;
use const phln\collection\append;

class AppendTest extends \Phln\Build\PhpUnit\TestCase
{
    public function getTestedFn(): string
    {
        return append;
    }

    /** @test */
    public function it_appends_value_to_array()
    {
        $list = [1, 2];
        $this->assertEquals([1, 2, 'a'], $this->callFn('a', $list));
        $this->assertEquals([1, 2, ['a']], $this->callFn(['a'], $list));
        $this->assertEquals([1, 2], $list);
    }

    /** @test */
    public function it_is_curried()
    {
        $appendFoo = $this->callFn('foo');
        $this->assertEquals(['foo'], $appendFoo([]));
    }
}
